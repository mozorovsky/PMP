<?php
class Content extends AppModel {
	var $name = 'Content';
	
	var $virtualFields = array( 
    	'qname' => 'CONCAT(Content.category, " - ", Content.title)' 
	); 
	
	var $validate = array( 
		'title' => array(        
			'rule' => 'notEmpty',	
			'required' => true,
			'message'    => 'Pole nemůže být prázdné.'
    	),
		'name' => array(        
            'required' => array(
                'rule' => array('notEmpty'),
                'message'    => 'Pole nemůže být prázdné.',
				'last' => true
            ),
			'corret' => array(
				'rule' => '/^[a-zA-Z0-9\/_-]+$/i', 
				'message' => 'Není platné pro URL.',				
				'last' => true
    		),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Název už existuje',
				'last' => true
            )
						    
		)
	);

}
?>