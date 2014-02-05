<?php
uses('sanitize');
class UsersController extends AppController {

    var $name = 'Users'; 	
    var $components = array('Auth', 'Email'); 
	var $helpers = array('Html', 'Form', 'Session', 'DatePicker');

	function beforeFilter() {	
		parent::beforeFilter();
		$this->Auth->loginError = "Neznámé uživatelské jméno nebo heslo.";
		$this->Auth->authError = "Pro zobrazení stránky je potřeba se přihlásit.";
		$this->Auth->allow('login','logout','add', 'activate','reqpass');
		$this->Auth->loginRedirect = '/users/success';
		$this->Auth->autoRedirect = false;
	}
	
	function beforeRender() {
    	parent::beforeRender();
    	$this->data['User']['npassword'] = '';
		$this->data['User']['passwordconf'] = '';
	}
	
	function success() {		
/*		$this->loadModel('Navigation');
		$this->set('navigations', $this->Navigation->find('all', array ('conditions' => array('Navigation.category' => 'alfa', 
				'Navigation.area' => 'user', 'Navigation.block' => 'left'), 'order' => array('Navigation.delta'))));
		$this->set('area', 'user');	*/
		$this->loadModel('Content');			
		$content = $this->Content->find('first', array ('conditions' => array('Content.name' => 'logininfo')));
		if ($content) {
		  	$this->set('content', $content['Content']['content']);
			$this->set('name', $content['Content']['name']);
		}	
	}

    function login() {
		if (!empty($this->data)) {
			// Use the AuthComponent's login action
        	if ($this->Auth->login($this->data)) {
				// Retrieve user data
				$results = $this->User->find(array('User.username' => $this->data['User']['username']), array('User.active'), null, false);
				// Check to see if the User's account isn't active
				if ($results['User']['active'] == 0) {
					// Uh Oh!
					$this->Session->setFlash('Váš účet není aktivován!');
					$this->Auth->logout();
					$this->data['User']['password'] = null;
					//$this->redirect('/users/login');
				}
				// Cool, user is active, redirect post login
				else {
		        	//$this->User->id = $this->Auth->user('id');
					//$this->User->saveField('login', date('Y-m-d H:i:s') );            
					//$this->redirect(array('controller' => 'properties', 'action' => 'myproperties', 'language' => $this->Auth->user('language')));
					//$this->redirect('/users/success');
					if ($this->Auth->user('role') == 'table') {
						$this->redirect('/admin/table');
					} else {
						$this->redirect($this->Auth->redirect());	
					}
				}
        	}
        }
		$this->set('title_for_layout','PMP | Přihlásit se');
    }	

    function logout() {
	   $this->Auth->logout();
       $this->redirect('/users/login');
    }
	
	function add() {
        if (!empty($this->data)) {
			Sanitize::clean($this->data);
    		$this->User->create();
			$password = $this->data['User']['npassword'];
			$this->convertPasswords();
			$this->data['User']['role'] = 'user';
			$this->data['User']['role_expire'] = date('Y-m-d H:i:s',strtotime('+90 days'));
        	if ($this->User->save($this->data)) {
				$this->__sendActivationEmail($this->User->getLastInsertID(), $password);
				$this->Session->setFlash('Byl Vám odeslán e-mail pro aktivaci účtu. K aktivaci účtu použijte link v mailu.');					
	          	$this->redirect(array('action' => 'login'));				
			} 
		}	
		$this->set('title_for_layout','PMP | Registrace uživatele');
    }
	
	function edit($id = NULL) {
		if ($id!=null && $this->Auth->user('role') == 'admin') {
			$this->User->id = $id;
		} else {
			$id= $this->Auth->user('id');	
			$this->User->id = $this->Auth->user('id');	
		}
		if (!empty($this->data)) {
			Sanitize::clean($this->data);
			unset($this->User->validate['username']);
			$olddata = $this->User->read(null, $id);
			if (isset($this->data['User']['npassword']) && $this->data['User']['npassword'] != '') {
				$this->convertPasswords();	
			} else {
				unset($this->User->validate['npassword']);
				$this->data['User']['npassword'] = $olddata['User']['password']; 	
			}			
			if ($this->User->save($this->data)) {	
				$this->Session->setFlash(__('The changes have been saved.',true));
				//$this->redirect(array('controller' => 'properties', 'action' => 'myproperties'));
			} 
			$this->data['User']['id'] = $id;
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}			
	}
	
	function courseleader() {
		$this->loadModel('Contact');
		if (empty($this->data)) {			
			$this->data = $this->Contact->find(array('vedouci' => 'kurz', 'user_id' => $this->Auth->user('id')));
			if (empty($this->data)) {
				$this->data['Contact']['email'] = $this->Auth->user('init');
			}
		}  else {
			$olddata = $this->Contact->find(array('vedouci' => 'kurz', 'user_id' => $this->Auth->user('id')));
			if (empty($olddata)) {
				$this->data['Contact']['user_id'] = $this->Auth->user('id');
				$this->data['Contact']['vedouci'] = 'kurz';								
			} else {
				$this->Contact->id = $olddata['Contact']['id'];
			}
			unset($this->Contact->validate['spolecenstvi']);
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('The changes have been saved.',true));
			} else {
				$this->Session->setFlash('Není možné uložit údaje.');
			}			
		}
		
	}

	function communityleader() {
		$this->loadModel('Contact');
		if (empty($this->data)) {			
			$this->data = $this->Contact->find(array('vedouci' => 'spolecenstvi', 'user_id' => $this->Auth->user('id')));
		}  else {
			$olddata = $this->Contact->find(array('vedouci' => 'spolecenstvi', 'user_id' => $this->Auth->user('id')));
			if (empty($olddata)) {
				$this->data['Contact']['user_id'] = $this->Auth->user('id');
				$this->data['Contact']['vedouci'] = 'spolecenstvi';								
			} else {
				$this->Contact->id = $olddata['Contact']['id'];
			}
			if (empty($this->data['Contact']['mobil'])) {
				unset($this->Contact->validate['mobil']);	
			}
			if (empty($this->data['Contact']['email'])) {
				unset($this->Contact->validate['email']);
			}
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('The changes have been saved.',true));
			} else {
				$this->Session->setFlash('Není možné uložit údaje.');
			}			
		}
		
	}
	
	function course($user_id = NULL) {
		$sendmail = TRUE;
		if ($this->Auth->user('role') == 'admin' && $user_id != NULL) {
			$this -> set('user_id', $user_id);
			$sendmail = FALSE;
		} else {
			$user_id = $this->Auth->user('id');
		}
		$this->loadModel('Contact');
		$this->set('allow', 'true');
		$spol = $this->Contact->find(array('vedouci' => 'spolecenstvi', 'user_id' => $user_id));
		if (!$spol) {
			$this->Session->setFlash('Nejdříve vyplňte údaje o vedoucím společenství.');	
			$this->set('allow', 'false');
		}
		if (!$this->Contact->find(array('vedouci' => 'kurz', 'user_id' => $user_id))) {
			$this->Session->setFlash('Nejdříve vyplňte údaje o vedoucím kurzu.');	
			$this->set('allow', 'false');
		}		
		$this->loadModel('Course');
		if (empty($this->data)) {			
			$this->data = $this->Course->find(array('user_id' => $user_id));
			if (empty($this->data)) {
				$this->data['Course']['poradatel'] = $spol['Contact']['spolecenstvi'];
			}

		}  else {
			$olddata = $this->Course->find(array('user_id' => $user_id));
			if (empty($olddata)) {
				$this->data['Course']['user_id'] = $user_id;
			} else {
				$this->Course->id = $olddata['Course']['id'];
			}
			if (!isset($this->data['Course']['onweb'])) {
				unset($this->Course->validate['mesto']);
				unset($this->Course->validate['poradatel']);	
				unset($this->Course->validate['kont_osoba']);	
				$this->data['Course']['onweb'] = FALSE;
			}
			if (!isset($this->data['Course']['iniciativa2013'])) {
				$this->data['Course']['iniciativa2013'] = false;
			}
			if (!isset($this->data['Course']['katolicky'])) {
				$this->data['Course']['katolicky'] = false;
			}							
			$this->data['Course']['approved'] = false;
			if ($this->Course->save($this->data)) {
				//$this->loadModel('User');
				$this->User->id = $user_id;
				$this->User->set('approved',false);
				$this->User->set('iniciativa2013',$this->data['Course']['iniciativa2013']);
				$this->User->save(NULL, FALSE);
				$this->Session->setFlash('Záznam byl uložen. Po kontrole údajů budou aktualizována data v seznamu kurzů přístupné veřejnosti.');
				if ($sendmail){
					$user = $this->User->find('first', array('conditions' => array('User.id' => $user_id)));
					if ($user) {
						$this->Email->to = 'milos.poborsky@o2active.cz;mozo@raz-dva.cz';
						$this->Email->subject = 'Změna záznamu kurzu alfa';
						$this->Email->from = 'noreply@' . env('SERVER_NAME');						
						$this->Email->sendAs = 'text';   // you probably want to use both :)	
						$body = 'Uživatel '.$user['Contact']['jmeno'].' '.$user['Contact']['prijmeni'].' ('.$user['User']['username'].') provedl změnu údajů o kurzu.
http://'.env('SERVER_NAME').'/admin/index/'.$user['User']['id'];
						if ($this->data['Course']['onweb']) {
							$body = $body.'
Změna se týká údajů přístupných veřejnosti.';				
						}
						$this->Email->send($body);	
					}					
				}				
			} else {
				$this->Session->setFlash('Není možné uložit údaje.');
			}			
		}
		
	}
	
	
	function convertPasswords() { 
		if(!empty( $this->data['User']['npassword'] ) ){ 
			$this->data['User']['npassword'] = $this->Auth->password($this->data['User']['npassword'] ); 
		} 
		if(!empty( $this->data['User']['passwordconf'] ) ){ 
			$this->data['User']['passwordconf'] = $this->Auth->password( $this->data['User']['passwordconf'] ); 
		} 
	}

	function __sendActivationEmail($user_id, $password) {
		$user = $this->User->find(array('User.id' => $user_id), array('User.init', 'User.username'), null, false);
		if ($user === false) {
			debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
			return false;
		}
 
		// Set data for the "view" of the Email
		$this->set('activate_url', 'http://' . env('SERVER_NAME') . '/users/activate/' . $user_id . '/' . $this->User->getActivationHash());
		$this->set('username', $this->data['User']['username']);
		$this->set('password', $password);
		$this->Email->to = $user['User']['init'];
		$this->Email->subject = 'Alfa - aktivace účtu';
		$this->Email->from = 'noreply@' . env('SERVER_NAME');
		$this->Email->template = 'user_confirm';
		$this->Email->sendAs = 'text';   // you probably want to use both :)	
		return $this->Email->send();
	}
	
	function activate($id = null, $in_hash = null) {
		$this->User->id = $id;
		if ($this->User->exists() && ($in_hash == $this->User->getActivationHash())) {
			// Update the active flag in the database
			$this->User->saveField('active', 1); 
			// Let the user know they can now log in!
			$this->Session->setFlash('Váš účet na webu Alfa ČR byl aktivován. Nyní se můžete přihlásit.');
			//$this->data['User']['username'] = $this->User->field('username');
			//$this->data['User']['password'] = $this->User->field('password');
			//$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'edit');
			//$this->login();			
		}
		$this->redirect('/users/login');
 
	// Activation failed, render '/views/user/activate.ctp' which should tell the user.
	}
	
	function reqpass() {
		if (!empty($this->data)) {
			Sanitize::clean($this->data);
			$usermail =  $this->User->find('first', array('fields' => array('User.id','User.init','User.username'), 'conditions' => array('User.username'=> $this->data['User']['username'])));				
			if (!$usermail) {
				$usermail =  $this->User->find('first', array('fields' => array('User.id','User.init','User.username'), 'conditions' => array('User.init'=> $this->data['User']['username'])));				}
			if (!$usermail) {
				$this->User->validationErrors['username'] = '';
				$this->Session->setFlash('Jméno / email nebylo nalezeno.');
			} else {
				$this->Email->from    = 'info@kurzyalfa.cz';
				$this->Email->to      = $usermail['User']['init'];
				$this->Email->subject = 'Kurzy Alfa - '.__('Request new password', true);
				$newpass = $this->generatePassword();
				$this->Email->send('Jméno uživatele - '.$usermail['User']['username'].' 
Vaše nové heslo je '.$newpass.'
Po přihlášení si heslo změňte v sekci - údaje uživatele.');
				$this->User->id = $usermail['User']['id'];
				$this->User->saveField('password', $this->Auth->password($newpass));
				$this->Session->setFlash('Bylo Vám zasláno nové heslo. Po přihlášení si jej změnte v sekci Údaje uživatele.');
				$this->redirect('/users/login');				
			}
		}
	}	
	
  function generatePassword ($length = 8)
  {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
	
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;

  }

	
}?>