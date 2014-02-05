<?php
class User extends AppModel {
    
	var $name = 'User';
	
	//var $useDbConfig = 'shared';
	
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message'  => 'This field is required.',
				'last' => true
            ),
			'correct' => array(
                'rule' => '/^[a-z0-9 \.\-_]{3,}$/i',
                'message'  => 'Neplatné uživatelské jméno.',
				'last' => true
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'The name is already taken.',
				'last' => true
            )

        ),
		'npassword' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message'    => 'This field is required.',
				'last' => true
            ),
			'checkequal' => array(
				'rule' => array('equaltofield','passwordconf'),
				'message' => 'Passwords does not match.',
				'last' => true
			)
        ),
		'init' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message'    => 'This field is required.',
				'last' => true
            ),
			'email' => array(
		        'rule' => array('email', true),
        		'message' => 'Not a valid email address.',
				'last' => true
    		),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email has already been taken.',
				'last' => true
            )

        ),
		'mail' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message'    => 'This field is required.',
				'last' => true
            ),
			'email' => array(
		        'rule' => array('email', true),
        		'message' => 'Not a valid email address.',
				'last' => true
    		),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email has already been taken.',
				'last' => true
            )

        )
    );
	
/*	public $hasOne = array(
        'Contact' => array(
            'className'  => 'Contact',
			'conditions' => array ('vedouci' => 'kurz')
        )
	);*/
	
	function equaltofield($check,$otherfield) { 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 		
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 
	
	function beforeSave(){ 
		if (isset($this->data['User']['npassword'])) {
			$this->data['User']['password'] = $this->data['User']['npassword']; 	
		}    	
    	return true; 
	}
	
	function getUserId($userName) {
		return $this->find('first', array('fields' => array('User.id'), 'conditions' => array('User.username'=>$userName)));
	}
	
	function getActivationHash() {
		if (!isset($this->id)) {
			return false;
		}
		return substr(Security::hash(Configure::read('Security.salt') . $this->field('created') . date('Ymd')), 0, 8);
	}
	
	function deleteUser ($id) {
		$this->deleteAll(array('User.id' => $id));		
	}
	
}

?>