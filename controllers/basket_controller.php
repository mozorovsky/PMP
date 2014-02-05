<?php
class BasketController extends AppController {
    
	var $name = 'Basket';
    var $helpers = array('Html', 'Form');
	
	function add() {
		//$this->Basket->set($this->data);
		if ($this->data['Item']['itemtotal'] == '' || $this->data['Item']['itemtotal'] == '0,- Kč' || strpos($this->data['Item']['itemtotal'],'NaN') === 0) {
			$this->Session->setFlash('Nekorektní údaje! Vyplňte znovu.');
			$this->redirect($this->referer());		
		} else {
			$this->data['Item']['itemtotal'] += 0;
			if (!$items = $this->Session->read('items')) {
				$items = array();
			}
			$toadd = TRUE;
			foreach ($items as &$item) {
				if ($item['Item']['name'] === $this->data['Item']['name']) {
					$item['Item']['count'] += $this->data['Item']['count'];
					$item['Item']['itemtotal'] += $this->data['Item']['itemtotal'];
					$toadd = FALSE;
				}
			}
			if ($toadd) {
				array_push($items, $this->data);	
			}
			$this->Session->write('items', $items);
        	$this->Session->write('last_infopage', $this->data['Item']['infolink']);
			//$this->Session->setFlash('Zboží v hodnotě '.$this->data['Item']['itemtotal'].' bylo přidáno do košíku.');
			$this->redirect('/basket/view');
		}
	}

	function view() {
		$this->Session->write('last_page', $this->referer());
		$this->set('items', $this->Session->read('items'));
		$navigations = array();
		$i = 0;
		if ($this->Session->read('items')) {
			$navigations[$i]['Navigation']['title'] = 'Vyprázdnit košík';
			$navigations[$i]['Navigation']['href'] = '/basket/clear';
			$i++;
			$navigations[$i]['Navigation']['title'] = 'Pokračovat v objednávce';
			$navigations[$i]['Navigation']['href'] = '/orders/add';
			$i++;			
		}
		if (!$last = $this->Session->read('last_infopage')) {
				$last = $this->Session->read('last_page');
			}
		$navigations[$i]['Navigation']['title'] = 'Zpět na nákup';
		$navigations[$i]['Navigation']['href'] = '/'.$last;	
		$this->set('navigations', $navigations);		
	}
	
	function clear() {
		$this->Session->write('items', null);	
		$this->redirect('/basket/view');
	}
	
	function delete($name = NULL) {
		$items = $this->Session->read('items');
		$i = 0;
			foreach ($items as $item) {
				if ($item['Item']['name'] === $name) {
					unset($items[$i]);	
					$this->Session->write('items', $items);
					$this->redirect('/basket/view');
				}
				$i++;	
			}		
	}
	
}
?>