<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {

	function beforeFilter() {				
		//$this->recordActivity(); 
	}

	function beforeRender() {		
    	parent::beforeRender();
		$items = $this->Session->read('items');
		$count = 0;
		$total = 0;
		if (!empty($items)) {
			foreach ($items as $item) {
				$count++;
				$total += $item['Item']['itemtotal'];
			}			
		}
		$this->set('bcount', $count);
		$this->set('btotal', $total);		
	}
	
	public function isEditor($role) {
		if ($role == 'admin') {
			return true;
		} else {
			return false;
		}
	}
	
	function recordActivity() {

		// The following line makes this script work for CakePHP installations that use either mod_rewrite or CakePHP's own URL shortening tricks. 
		$pages = str_replace("/index.php",'', $_SERVER['PHP_SELF']);
		$pages = explode("/", $pages);
		
		$this->loadModel('Activity');
		// You will probably all reconise this, we are just getting all the values we need to store and assigning them to CakePHP. 
		//$this->data['Activity']['model'] = $pages[2];
		/*if ($this->params['controller'] != 'properties' && $this->params['controller'] != 'Properties') {
			return;
		}*/
		$this->data['Activity']['controller'] = $this->params['controller'];
		if (isset($this->params['action'])){		
			$this->data['Activity']['action'] = $this->params['action'];
		}
		if (isset($this->params['pass']['0'])){
			$this->data['Activity']['param'] = $this->params['pass']['0'];
		}
		if($this->Session->check('Auth.User.username')) {
			$this->data['Activity']['user'] = $this->Session->read('Auth.User.username');
		} else {
			$this->data['Activity']['user'] = 'Anonymous';
		}
		$this->data['Activity']['user_ip'] = $_SERVER['REMOTE_ADDR'];
		$this->data['Activity']['user_browser'] = $_SERVER['HTTP_USER_AGENT'];
		if (isset( $_SERVER['HTTP_REFERER'])) {
			$this->data['Activity']['clicked_from'] = $_SERVER['HTTP_REFERER'];	
		}
		$this->Activity->save($this->data);

		// The following line is a fix by Termnial13 (thanks). It removes tracker stuffs from $this->data as it was causing some users issues.
		unset($this->data['Activity']);

	}

}
