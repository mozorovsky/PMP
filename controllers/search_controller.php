<?php
class SearchController extends AppController {
    
	var $name = 'Search';
    var $helpers = array('Html');
	var $paginate = array(	
			 'fields' => array ('Content.name', 'Content.title'),		
             'limit' => 10,
		'order' => array(
               'Content.modified' => 'DESC'
               )
            );      
	
	function index() {
		$this->loadModel('Content');
		$cond = array('Content.type' => 'product' , array( 'OR' => array(
				'Content.title LIKE' => '%'.$this->data['Search']['searchquery'].'%',
				'Content.name LIKE' => '%'.$this->data['Search']['searchquery'].'%',
				'Content.category LIKE' => '%'.$this->data['Search']['searchquery'].'%',
				'Content.area LIKE' => '%'.$this->data['Search']['searchquery'].'%'
			)));
		$this->set('products', $this->paginate('Content', $cond));	
		/*$log = $this->Content->getDataSource()->getLog(false,FALSE);
		debug($log);*/
		$this->set('content_title', 'Výsledek vyhledávání "'.$this->data['Search']['searchquery'].'"');	
	}
	
		
}
?>