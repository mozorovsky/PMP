<?php
class GalleriesController extends AppController {  
 
	var $name = 'Galleries';
	public $helpers = array('Html', 'Media.Media', 'Time', 'Paginator', 'Javascript');
	var $components = array('RequestHandler');
	var $paginate = array(			
             'limit' => 10,
             'order' => array(
               'Gallery.created DESC'
               )
            );      

	var $saved;
	
	function beforeRender() {
    	parent::beforeRender();
		$this->layout = 'ajax';
	}

	function view() {
		$this->set('imgs', $this->paginate('Gallery', array('dirname' => 'img')));
		$uploads = $this->Gallery->find('all', array('fields' => array('Gallery.dirname', 'Gallery.basename'),
					'conditions' => array('not' => array('dirname'=>'img'))));
		$options = array();
		foreach ($uploads as $upload) {
			$options[$upload['Gallery']['dirname'].'/'.$upload['Gallery']['basename']] = $upload['Gallery']['basename'];
		}
		$this->set('uploads', $options);
		$this->loadModel('Content');
		$contents = $this->Content->find('list', array('fields' => array('Content.name', 'Content.qname')));
		$this->set('contents', $contents);										

 	}

	function add($flat_id=NULL) {
		if (!empty($this->data)) {
			$this->data['Picture']['user_id'] = '1';		
			if ($this->Gallery->save($this->data['Picture'])) {
				$this -> Gallery -> read();
				if (empty($this -> Gallery -> data)) {
					$result = "";
					$this->set('result', $result);		
					$this->render('/elements/galerror', 'ajax');	
				} else {
					$this->set('picture', $this -> Gallery -> data);		
					$this->render('/elements/galajax', 'ajax');	
				}
			} else {
				$result = '<div id="message" class="red">'. $this->Gallery->validationErrors['file'] .'</div>';
				$this->set('result', $result);		
				$this->render('/elements/galerror', 'ajax');
			} 
			
		} else {
				$result = "<div id='status' class='red'>Vybraný soubor není možné nahrát.</div>";
				$this->set('result', $result);		
				$this->render('/elements/galerror', 'ajax');			
		}
	}

	function delete($id=NULL, $renderView = false) {
		if (isset($id)) {
			$this->Gallery->delete($id);
			if (!$renderView) {
				$this->render('/elements/galadd', 'ajax');	
			} else {
				$this->redirect('/galleries/view');
			}
		} else  {
			if (!$renderView) {
				$result = "<div id='status' class='red'>Nastala chyba.</div>";
				$this->set('result', $result);		
				$this->render('/elements/galerror', 'ajax');						
			} else {
				$this->redirect('/galleries/view');
			}
		}
	}
	
}	
?>