<?php
class AdminController extends AppController {

    var $name = 'Admin'; 	
    var $components = array('Auth','RequestHandler'); 
	var $helpers = array('Html', 'Form', 'Time', 'Javascript', 'DatePicker', 'Ajax');
	var $paginate = array(		
             'limit' => 10,
			 'order' => array(
               'Order.created' => 'DESC'
               )
            );      
	

	function beforeFilter() {	

	parent::beforeFilter();
		$this->Auth->authError = "Pro zobrazení stránky je potřeba se přihlásit.";
	}
	
	function beforeRender() {
    	parent::beforeRender();
	}
	
	function orders() {
		$this->loadModel('Order');
		$this->set('orders',$this->paginate('Order', array('Order.state !=' => 'nová')));
		
	}
	
	function view($order_id = NULL) {
		$this->loadModel('Order');
		$this->set('order',  $this->Order->find('first', array('conditions' => array('Order.id' => $order_id))));
	}
	
	function save_order() {
  		if ( $this->RequestHandler->isAjax() ) {
			Configure::write ( 'debug', 0 );
   			$this->autoRender=false;
			$id = $state = $this->params['form']['Model']['id'];
			$state = $this->params['form']['Model']['state'];
			$exp = $this->params['form']['Model']['expedition'];
			$this->loadModel('Order');
			$this->Order->id = $id;
			
			if ($this->Order->saveField('state', $state) && $this->Order->saveField('expedition', $exp)) {
				echo '&nbsp;Uloženo.';	
			} else {
				echo '&nbsp;Nepodařilo se uložit.';
			}			
		}
	}	

}
?>