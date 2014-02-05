<?php	
	header('Content-type: text/html;charset=UTF-8');
	echo $this->Form->input('Picture.file', array('type' => 'file', 'accept' => 'png,gif,jpg,jpeg', 'size' => '22', 'label' => false, 'div' => false, 'id' => 'file-upload')).
		$this-> Form ->button ('Nahrávání souborů', array('id' => 'buttonUpload', 'picid' => '','class' => 'form-submit', 'onclick' => 'return ajaxFileUpload(\'/galleries/add\',\'file-upload\',\'upload-wrapper\',\'0\');'));		

?>
