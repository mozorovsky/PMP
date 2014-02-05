<?php
class Basket extends AppModel {
    
	public $useTable = false;
	/*]	public $_schema = array (
		'count' => array('type' => 'decimal', 'limit' => '64'),
		'itemtotal' => array('type' => 'string', 'length' => '64'),
		'name' => array('type' => 'string', 'length' => '64')
	);
	
	public $validate = array(
		'itemtotal' => array(
            //'rule' => array('decimal', 2),
			'rule' => 'checkContact',
            'message'  => 'Není korektní množství.'
         )
	);
	
	function checkContact($check){ 
		return FALSE;
	}*/

}