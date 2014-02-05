<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @subpackage    cake.cake.libs.model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application model for Cake.
 *
 * This is a placeholder class.
 * Create the same file in app/app_model.php
 * Add your application-wide methods to the class, your models will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.model
 */
class AppModel extends Model {

/**
* Overrides the Core invalidate function from the Model class
* with the addition to use internationalization (I18n and L10n)
* @param string $field Name of the table column
* @param mixed $value The message or value which should be returned
* 2009-07-27 ms
*/
	function invalidate($field, $value = null) {
		if (!is_array($this->validationErrors)) {
			$this->validationErrors = array();
		}
		if(empty($value)) {
			$value = true;
		}
		if (is_array($value)) {
			if (count($value) > 2) { # string %s %s string, trans1, trans2
				$translatedValue = sprintf(__($value[0], true), $value[1], $value[2]);
			} else { # string %s string, trans1
				$translatedValue = sprintf(__($value[0], true), $value[1]);
			}
			$this->validationErrors[$field] = $translatedValue;
		} else {
			$this->validationErrors[$field] = __($value, true);
		}
	}
	
	public function sum($field='total', $cond = null) {	
		if ($cond != null) {
			$data = $this->find('first', array(
				'conditions'=> $cond ,
				'fields'=>array('SUM('.$field.') AS summed'),
				'contain'=>array()
			));			
		} else {
			$data = $this->find('first', array(
				'fields'=>array('SUM('.$field.') AS summed'),
				'contain'=>array()
			));
		}
		return $data[0]['summed'];
	}

}
