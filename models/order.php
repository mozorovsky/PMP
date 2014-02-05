<?php
class Order extends AppModel {

	var $name = 'Order';
	var $hasOne = 'Contact';
	var $hasMany = 'Item';
	
}
?>