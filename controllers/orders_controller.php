<?php
uses('sanitize');
class OrdersController extends AppController {
    
	var $name = 'Orders';
	var $components = array('Email','RequestHandler'); 
    var $helpers = array('Html', 'Form', 'Ajax');
	
	function add($order_id = NULL) {
        if (!empty($this->data)) {
			//$this->data = Sanitize::clean($this->data, array('remove_html' => true));
			if (!$items = $this->Session->read('items')) {
				$this->Session->setFlash('Košík je prázdný!');
				return;
			}
			/*$this->Order->create();
			if ($order_id != NULL) {
				$this->Order->id = $order_id;
			}*/
			if (!$this->Order->saveAll($this->data)) {
				$this->Session->setFlash('Problem order save!');
				return;
			}
			$order_total = 0;
			foreach ($items as $item) {
				$this->loadModel('Item');
				$this->Item->create();
				$item['Item']['order_id'] = $this->Order->id;
				$this->Item->save($item);
				$order_total += $item['Item']['itemtotal'];
			}
			if ($this->data['Order']['transport'] == 'P' && $this->data['Order']['transportprice'] > 0) {
				$order_total += $this->data['Order']['transportprice'];
			}
			$this->Order->saveField('price', $order_total);
			$this->Session->write('order', $this->Order->id);
			//$this->Session->setFlash('Saved!');
			$this->redirect('/orders/view');
		} else {
			if ($order_id = $this->Session->read('order')) {
				$this->data = $this->Order->find('first', array('conditions' => array('Order.id' => $order_id)));
				$this->Order->id = $order_id;
			}
		}		
	}
	
	function view($order_id = NULL) {
		if (!$order_id = $this->Session->read('order')) {
				$this->Session->setFlash('Nelze načíst data!');
				return;			
		} 
		$this->set('order',  $this->Order->find('first', array('conditions' => array('Order.id' => $order_id))));		
	}
	
	function confirm() {
		if (!$order_id = $this->Session->read('order')) {
				$this->Session->setFlash('Nelze načíst data!');
				$this->redirect('/orders/view');
				return;			
		}
		if (!empty($this->data) && $this->data['Order']['accept']) {
			$this->Order->id = $order_id;
			if ($this->Order->saveField('state', 'potvrzená')) {
				$this->Session->write('items', null);
				$this->Session->write('order', null);
				$this->Session->setFlash('Objednávka byla odeslána. Děkujeme za Váš nákup.');
				$this->Email->to = 'kaja.ozorovsky@seznam.cz,mozorovsky@gmail.com';
				$this->Email->subject = 'Nová objednávka';
				$this->Email->from = 'noreply@' . env('SERVER_NAME');						
				$this->Email->sendAs = 'text';   // you probably want to use both :)	
				$body = 'Byla potvrzena nová objednávka.
http://'.env('SERVER_NAME').'/admin/view/'.$order_id;
				$this->Email->send($body);	
				$this->redirect('/basket/view');
			} else {
				$this->Session->setFlash('Nebylo možné uložit objednávku!');
			}
		} else {
			$this->Session->setFlash('Nebylo možné uložit objednávku!');
		}
		$this->redirect('/orders/view');
	}
	
	function get_transport_price() {
  		if ( $this->RequestHandler->isAjax() ) {
   			Configure::write ( 'debug', 0 );
   			$this->autoRender=false;
			$orig=urlencode("Havlíčkova 29j,Zábřeh,Šumperk,CZ");
			$dest =urlencode($this->params['form']['Model']['street'].",".$this->params['form']['Model']['psc']." ".$this->params['form']['Model']['city'].",".$this->params['form']['Model']['okres'].",CZ");
			if ($this->params['form']['Model']['check'] === 'true') {
				$dest =urlencode($this->params['form']['Model']['a_street'].",".$this->params['form']['Model']['a_psc']." ".$this->params['form']['Model']['a_city'].",".$this->params['form']['Model']['a_okres'].",CZ");				
			}
			$url='http://maps.googleapis.com/maps/api/distancematrix/json?origins='.$orig
					.'&destinations='.$dest.'&sensor=false';

    		$json = file_get_contents($url);
			$out = json_decode($json, TRUE);
    		//echo 'Od: '.$out['origin_addresses'][0].' do: '. $out['destination_addresses'][0].' : '.$out['rows'][0]['elements'][0]['distance']['text'];
			$distance = $out['rows'][0]['elements'][0]['distance']['text'];
			if (strstr($distance, ' m')) {
				$distance = 1;
			}	
			$trprice = 1680;
			$desc = 'Pásmo nad 200 km:';
			if ($distance < 31) {
				$trprice = 240;
				$desc = 'Pásmo do 30 km:';
			} elseif ($distance < 101) {
				$trprice = 720;
				$desc = 'Pásmo 31-100 km:';
			} elseif ($distance < 201) {
				$trprice = 1200;
				$desc = 'Pásmo 101-200 km:';
			}
			echo 'Vypočtaná vzdálenost do '. $out['destination_addresses'][0].' : '.$out['rows'][0]['elements'][0]['distance']['text'].'<p><br/></p>';
			echo '<div class="form-item"><label for="trinfo">'.$desc.'</label><input name="trinfo" type="text" class="form-text" size="10" maxlength="128" id="trinfo" value="'.$trprice.'" readonly="readonly" style="text-align: right;"/> Kč<div class="clear"></div></div><script>document.getElementById(\'OrderTransportprice\').value = '.$trprice.';</script>';
		}		
		
	}
	
}	
?>