<?php class Contact extends AppModel {
    
	public $name = 'Contact';
	
	public $validate = array(
		'jmeno' => array(        
			'rule' => 'notEmpty',	
			'required' => true,
			'message'    => 'This field is required.'
    	),
		'prijmeni' => array(        	
			'rule' => 'notEmpty',	
			'required' => true,
			'message'    => 'This field is required.'
    	),
		'telefon' => array(        			
			'rule' => array('phone', '~^(\+420)? ?\d{3} ?\d{3} ?\d{3}$~'),
			'allowEmpty' => true,
			'message'    => 'Neplatné telefonní číslo'
    	),
		'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message'    => 'This field is required.',
				'last' => true
            ),
			'email' => array(
		        'rule' => array('email', true),
        		'message' => 'Not a valid email address.',
				'last' => true
    		)
        ),
		'mobil' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message'    => 'This field is required.',
				'last' => true
            ),
			'phone' => array(
		        'rule' => array('phone', '~^(\+420)? ?\d{3} ?\d{3} ?\d{3}$~'),
        		'message'    => 'Neplatné telefonní číslo',
				'last' => true
    		)
        )		
	);
	
	//var $belongsTo = 'User';
	
}