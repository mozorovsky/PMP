<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'content', 'action' => 'view', 'home'));
	Router::connect('/content/add/*', array('controller' => 'content', 'action' => 'add'));
	Router::connect('/content/edit/*', array('controller' => 'content', 'action' => 'edit'));
	Router::connect('/content/delete/*', array('controller' => 'content', 'action' => 'delete'));
	Router::connect('/navigation/view/*', array('controller' => 'navigation', 'action' => 'view'));	
	Router::connect('/navigation/add/*', array('controller' => 'navigation', 'action' => 'add'));
	Router::connect('/navigation/edit/*', array('controller' => 'navigation', 'action' => 'edit'));
	Router::connect('/navigation/delete/*', array('controller' => 'navigation', 'action' => 'delete'));	
	Router::connect('/galleries/view/*', array('controller' => 'galleries', 'action' => 'view'));	
	Router::connect('/galleries/add/*', array('controller' => 'galleries', 'action' => 'add'));
	Router::connect('/galleries/delete/*', array('controller' => 'galleries', 'action' => 'delete'));		
	Router::connect('/users/login', array('controller' => 'users', 'action' => 'login'));	
	Router::connect('/users/logout', array('controller' => 'users', 'action' => 'logout'));	
	Router::connect('/users/success', array('controller' => 'users', 'action' => 'success'));	
	Router::connect('/basket/view/*', array('controller' => 'basket', 'action' => 'view'));
	Router::connect('/basket/add/*', array('controller' => 'basket', 'action' => 'add'));	
	Router::connect('/basket/clear/*', array('controller' => 'basket', 'action' => 'clear'));
	Router::connect('/basket/delete/*', array('controller' => 'basket', 'action' => 'delete'));	
	Router::connect('/orders/add/*', array('controller' => 'orders', 'action' => 'add'));
	Router::connect('/orders/view/*', array('controller' => 'orders', 'action' => 'view'));	
	Router::connect('/orders/confirm/*', array('controller' => 'orders', 'action' => 'confirm'));		
	Router::connect('/search/*', array('controller' => 'search', 'action' => 'index'));	
	Router::connect('/admin/orders/*', array('controller' => 'admin', 'action' => 'orders'));	
	Router::connect('/admin/view/*', array('controller' => 'admin', 'action' => 'view'));
	Router::connect('/admin/save_order/*', array('controller' => 'admin', 'action' => 'save_order'));	
	Router::connect('/orders/get_transport_price/*', array('controller' => 'orders', 'action' => 'get_transport_price'));	
	//Router::connect('/orders/get_a_address/*', array('controller' => 'orders', 'action' => 'get_a_address'));	
	Router::connect('/*', array('controller' => 'content', 'action' => 'view'));
