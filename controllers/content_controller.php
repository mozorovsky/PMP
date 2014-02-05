<?php

class ContentController extends AppController {
    
	var $name = 'Content';
    var $helpers = array('Html', 'Form', 'Javascript', 'TinyMCE', 'Ajax', 'Number');
	public $components = array('Auth');
	var $paginate = array(			
             'limit' => 10,
             'order' => array(
               'Gallery.created DESC'
               )
            );  
			
	function beforeFilter() {	
		parent::beforeFilter();
		$this->Auth->loginError = "Neznámé uživatelské jméno nebo heslo.";
		$this->Auth->authError = "Pro zobrazení stránky je potřeba se přihlásit.";
		$this->Auth->allow('view');
	}

	/*function beforeRender() {
    	//parent::beforeRender();
		$this->loadModel('Navigation');
		if (isset($this->viewVars['category']) && $this->viewVars['category'] != 'users') {
			$this->set('uppermenus', $this->Navigation->find('all', array ('conditions' => array('Navigation.category' => $this->viewVars['category'], 'Navigation.block' => 'upper'), 'order' => array('Navigation.delta'))));
		} else {
			$this->set('uppermenus', $this->Navigation->find('all', array ('conditions' => array('Navigation.category' => 'alfa', 'Navigation.block' => 'upper'), 'order' => array('Navigation.delta'))));			
		}
		$this->set('usernavigations', $this->Navigation->find('all', array ('conditions' => array('Navigation.category' => 'users', 'Navigation.block' => 'left'), 'order' => array('Navigation.delta'))));

	}*/
	
	public function view ($name=null) {
		if ($name==null) {
			$this->redirect('/');	
		}	
		$content = $this->Content->find('first', array ('conditions' => array('Content.name' => $name)));
		if ($content['Content']['category'] == 'users' && $this->Auth->user('role') == NULL) {
			$this->redirect('/');	
		}
		if ($content) {
		  	$this->set('content', $content['Content']['content']);			
			$this->set('type', $content['Content']['type']);			
			$this->set('price', $content['Content']['price']);			
			$this->set('ratio', $content['Content']['ratio']);			
			$this->set('infolink', $content['Content']['infolink']);
			$this->set('products',  $this->Content->find('all', array ('conditions' => array('Content.type' => 'product','Content.infolink' => $content['Content']['name']))));
			$this->set('category', $content['Content']['category']);			
			$this->set('area', $content['Content']['area']);			
			$this->set('name', $content['Content']['name']);
			if ($content['Content']['category'] == '') {
				$this->set('title_for_layout', 'PMP | '.$content['Content']['title']);
			} else {
				$this->set('title_for_layout',$content['Content']['category'].' | '.$content['Content']['title']);
			}		        
			$this->set('content_title',$content['Content']['title']);
			$this->loadModel('Navigation');
			if ($content['Content']['category'] != 'users') {
				if ($content['Content']['category'] == 'LAMINÁTOVÉ PODLAHY') {
					$this->set('navigations', $this->Navigation->find('all', array ('conditions' => array('Navigation.category' => $content['Content']['category'], 
					'Navigation.area' => $content['Content']['area'], 'Navigation.block' => 'left'), 'order' => array('Navigation.delta'))));				

				} else {
					$this->set('navigations', $this->Navigation->find('all', array ('conditions' => array('Navigation.category' => $content['Content']['category'], 
					'Navigation.block' => 'left'), 'order' => array('Navigation.delta'))));									
				}
			}
			$this->set('new','0');				
			
		} else {
		  	$this->set('content', '');			
			$this->set('type', '');			
			$this->set('category', $name);			
			$this->set('area', $name);			
			$this->set('name', $name);		        
			$this->set('title_for_layout','Prázdný obsah');
			$this->set('content_title',$name);			
			$this->set('new','1');			
		}
    }
	
	public function edit ($name=null) {
		if (!$this->isEditor($this->Auth->user('role'))) {
			$this->redirect('/');	
		}	
		if (empty($this->data)) {			
			$this->data = $this->Content->find('first', array ('conditions' => array('Content.name' => $name)));		
			if ($this->data) {
				$this->set('category', $this->data['Content']['category']);						
				$this->set('content_title',$this->data['Content']['title']);
				$this->set('area', $this->__getArea($this->data['Content']['category']));														
			}
		} else {
			if (isset($this->params['form']['preview'])) {
				 $this->set('preview', $this->data['Content']['content']);
				 $this->set('title', $this->data['Content']['title']);
				 $this->set('area', $this->__getArea($this->data['Content']['category']));														
			} elseif (isset($this->params['form']['save'])) {
				$this->data['Content']['user_id'] = $this->Auth->user('id');
				if ($this->Content->save($this->data)) {
					//$this->Content->id = $id;
					$this->redirect('/'.$this->data['Content']['name']);
				} else {
					$this->set('area', $this->__getArea($this->data['Content']['category']));														
				} 				
			} else {
				$this->set('area', $this->__getArea($this->data['Content']['category']));														
			}
		}
		$this->set('infolinks', $this->Content->find('list', array('fields' => array('Content.name', 'Content.title'), 'conditions' => array('Content.type' => 'info'))));
	}
		
	public function add ($name=null) {
		if (!$this->isEditor($this->Auth->user('role'))) {
			$this->redirect('/');	
		}	
		if (empty($this->data)) {			
			$this->data['Content']['name'] = $name;
			$this->data['Content']['category'] = 'LAMINÁTOVÉ PODLAHY';
			$this->set('area', $this->__getArea($this->data['Content']['category']));														
			$this->data['Content']['content'] = '';
		} else {
			//$this->data['Content']['name'] = $this->data['Content']['id'];
			if (isset($this->params['form']['preview'])) {
				 $this->set('preview', $this->data['Content']['content']);
				 $this->set('title', $this->data['Content']['title']);
				 $this->set('category', $this->data['Content']['category']);	
  				 $this->set('area', $this->__getArea($this->data['Content']['category']));														
			}  elseif (isset($this->params['form']['save'])) {
				$this->data['Content']['user_id'] = $this->Auth->user('id');
				if ($this->Content->save($this->data)) {
					//$this->Content->id = $id;
					$this->redirect('/'.$this->data['Content']['name']);
				} else {
					$this->set('area', $this->__getArea($this->data['Content']['category']));														
				}
			} else {
				/*$this->loadModel('Navigation');
				$area = $this->Navigation->find('list', array('fields' => array('Navigation.area', 'Navigation.title'), 
						'conditions' => array('Navigation.category' => $this->data['Content']['category'],'Navigation.block' => 'left'), 'order' => array('Navigation.delta')));*/
				$this->set('area', $this->__getArea($this->data['Content']['category']));														
			}
		}		
		$this->set('infolinks', $this->Content->find('list', array('fields' => array('Content.name', 'Content.title'), 'conditions' => array('Content.type' => 'info'))));
	}
	
	public function delete ($id=null) {
		if (!$this->isEditor($this->Auth->user('role'))) {
			$this->redirect('/');	
		}	
		$contents = $this->Content->find('list', array('fields' => array('Content.name', 'Content.qname')));
		$this->set('contents', $contents);	
		if ($id != NULL) {
			$this->Content->delete($id);
			$this->redirect('/content/delete');
			return;
		}									
		if (!empty($this->data)) {	
			$this->set('content',$this->Content->find('first', array ('conditions' => array('Content.name' => $this->data['Content']['name']))));
		} 	
	}

	public function getLink() {
		//$this->set('linktext',$this->data['Content']['linktext']);
		$this->set('link',$this->data['Content']['contents']);
    	$this->render('/elements/ajax_link', 'ajax');
	}

	function __getArea($category=NULL) {
		$this->loadModel('Navigation');
		$area = $this->Navigation->find('list', array('fields' => array('Navigation.area', 'Navigation.title'), 
				'conditions' => array('Navigation.category' => $category,'Navigation.block' => 'upper'), 'order' => array('Navigation.delta')));		
		return $area;
	}
}

?>