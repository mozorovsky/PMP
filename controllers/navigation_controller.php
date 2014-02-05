<?php

class NavigationController extends AppController {
    
	var $name = 'Navigation';
    var $helpers = array('Html', 'Form');
	public $components = array('Auth');
	
	function beforeFilter() {	
		parent::beforeFilter();
		$this->Auth->loginError = "Neznámé uživatelské jméno nebo heslo.";
		$this->Auth->authError = "Pro zobrazení stránky je potřeba se přihlásit.";
		//$this->Auth->allow('view');
	}

/*	function beforeRender() {
    	parent::beforeRender();
	}*/
	
	public function view ($category = NULL, $area = NULL) {
		if (!$this->isEditor($this->Auth->user('role'))) {
			$this->redirect('/');	
		}
		if ($category == 'users')	{
			$area = '';
		}
		if (empty($this->data)) {			
			if ($category != NULL)	{
				$areas= $this->Navigation->find('list', array('fields' => array('Navigation.area', 'Navigation.title'), 
							'conditions' => array('Navigation.block' =>'upper', 'Navigation.category' => $category, 'Navigation.area NOT' => ''), 
							'order' => array('Navigation.delta')));
				$this->set('areas', $areas);		
				if ($category == 'LAMINÁTOVÉ PODLAHY'){
					$this->set('navigations', $this->Navigation->find('all', 
							array ('conditions' => array('Navigation.category' => $category, 'Navigation.area' => $area, 'Navigation.block' => 'left'),'order' => 'delta')));						
				} else {
					$this->set('navigations', $this->Navigation->find('all', 
							array ('conditions' => array('Navigation.category' => $category, 'Navigation.block' => 'left'),'order' => 'delta')));	
				
				}
				$this->set('navigations', $this->Navigation->find('all', 
							array ('conditions' => array('Navigation.category' => $category, 'Navigation.area' => $area, 'Navigation.block' => 'left'),'order' => 'delta')));	
				$this->data['Navigation']['initcat'] = $category;				
				$this->data['Navigation']['category'] = $category;				
				$this->data['Navigation']['area'] = $area;				
			} else {
				$areas= $this->Navigation->find('list', array('fields' => array('Navigation.area', 'Navigation.title'), 
							'conditions' => array('Navigation.block' =>'upper', 'Navigation.category' => 'LAMINÁTOVÉ PODLAHY', 'Navigation.area NOT' => ''), 
							'order' => array('Navigation.delta')));
				$this->set('areas', $areas);			
				$this->set('navigations', $this->Navigation->find('all', 
							array ('conditions' => array('Navigation.category' => 'LAMINÁTOVÉ PODLAHY', 'Navigation.area' => 'Classen', 'Navigation.block' => 'left'),
							'order' => 'delta')));	
				$this->data['Navigation']['initcat'] = 'LAMINÁTOVÉ PODLAHY';				
			}
		} else {
			if (isset($this->params['form']['order'])) { 
				foreach ($this->data['Order'] as $order):					
					$this->Navigation->id = $order['id'];
					$this->Navigation->saveField('delta', $order['delta']);
				endforeach;
			} 
			$areas= $this->Navigation->find('list', array('fields' => array('Navigation.area', 'Navigation.title'), 
						'conditions' => array('Navigation.block' =>'upper', 'Navigation.category' => $this->data['Navigation']['category'], 'Navigation.area NOT' => ''), 
						'order' => array('Navigation.delta')));
			$this->set('areas', $areas);						
			if ($this->data['Navigation']['initcat'] != $this->data['Navigation']['category']) {
				if ( $this->data['Navigation']['category'] == 'users') {
					$this->data['Navigation']['area'] = '';	
				} else {
					$this->data['Navigation']['area'] = key($areas);	
				}				
			}
			$this->data['Navigation']['initcat'] = $this->data['Navigation']['category'];
			if ($this->data['Navigation']['category'] == 'LAMINÁTOVÉ PODLAHY') {
				$this->set('navigations', $this->Navigation->find('all', array ('conditions' => array('Navigation.category' => $this->data['Navigation']['category'], 
						'Navigation.area' => $this->data['Navigation']['area'], 'Navigation.block' => 'left'),	'order' => 'delta')));
				
			} else {
				$this->set('navigations', $this->Navigation->find('all', array ('conditions' => array('Navigation.category' => $this->data['Navigation']['category'], 
						'Navigation.block' => 'left'),	'order' => 'delta')));
			
			}
		}
    }
	
	public function edit ($id=null) {
		if (!$this->isEditor($this->Auth->user('role'))) {
			$this->redirect('/');	
		}		
		if (empty($this->data)) {			
			$this->data = $this->Navigation->find('first', array ('conditions' => array('Navigation.id' => $id)));		
			$this->loadModel('Content');
			$contents = $this->Content->find('list', array('fields' => array('Content.name', 'Content.title'), 
				'conditions' => array('Content.category' => $this->data['Navigation']['category'])));
			$this->set('contents', $contents);
		} else {
			$this->data['Navigation']['user_id'] = $this->Auth->user('id');
			if ($this->Navigation->save($this->data)) {
				//$this->Content->id = $id;
				$this->redirect('/navigation/view/'.$this->data['Navigation']['category'].'/'.$this->data['Navigation']['area']);
			} 	
			$this->loadModel('Content');
			$contents = $this->Content->find('list', array('fields' => array('Content.name', 'Content.title'), 
				'conditions' => array('Content.category' => $category)));
			$this->set('contents', $contents);							
			
		}
	}
	
	public function add ($category=NULL, $area=NULL, $delta = 0) {
		if (!$this->isEditor($this->Auth->user('role'))) {
			$this->redirect('/');	
		}			
		if (empty($this->data)) {			
			$this->data['Navigation']['block'] = 'left';				
			$this->data['Navigation']['category'] = $category;	
			if ($category == 'users') {
				$this->data['Navigation']['area'] = '';				
				$this->data['Navigation']['delta'] = $area + 1;				
				$area = '';
			} else {
				$this->data['Navigation']['area'] = $area;				
				$this->data['Navigation']['delta'] = $delta + 1;												
			}			
			$this->loadModel('Content');
			$contents = $this->Content->find('list', array('fields' => array('Content.name', 'Content.title'), 
				'conditions' => array('Content.category' => $category)));
			$this->set('contents', $contents);							
						
		} else {
			$this->data['Navigation']['user_id'] = $this->Auth->user('id');
			if ($this->Navigation->save($this->data)) {
				//$this->Content->id = $id;
				$this->redirect('/navigation/view/'.$this->data['Navigation']['category'].'/'.$this->data['Navigation']['area']);
			} 				
			$this->loadModel('Content');
			$contents = $this->Content->find('list', array('fields' => array('Content.name', 'Content.title'), 
				'conditions' => array('Content.category' => $category)));
			$this->set('contents', $contents);										
		}	
	}
	
	public function delete ($id=null) {
		if (!$this->isEditor($this->Auth->user('role'))) {
			$this->redirect('/');	
		}		
		$navigation =  $this->Navigation->find('first', array('fields' => array('Navigation.category', 'Navigation.area'), 'conditions' => array('Navigation.id' =>$id)));
		$this->Navigation->delete($id);
		$this->redirect('/navigation/view/'.$navigation['Navigation']['category'].'/'.$navigation['Navigation']['area']);
	}

	public function order () {
		if (!$this->isEditor($this->Auth->user('role'))) {
			$this->redirect('/');	
		}		
	}

}

?>