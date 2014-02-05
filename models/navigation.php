<?php
class Navigation extends AppModel {
	var $name = 'Navigation';
	
	var $validate = array(    
		'title' => array(        
			'rule' => 'notEmpty',	
			'required' => true,
			'message'    => 'Pole nemůže být prázdné.'
    	)
		/*'href' => array(        
			//'rule' => '/^[a-zA-Z0-9\/_-]+$/i',
			//'rule' => '/(http:\/)?(\/[\w\.\-]+)+\/?/i',
			'message' => 'Není platné URL.'			    
		)*/
	);
}
?>