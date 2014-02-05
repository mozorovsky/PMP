<?php	
	header('Content-type: text/html;charset=UTF-8');
	/*if ($picture['Gallery']['dirname'] != 'img') {
		$result = $this->Html->link($picture['Gallery']['basename'], '/media/transfer/'.$picture['Gallery']['dirname'].'/'.$picture['Gallery']['basename']);
		if ($picture['Gallery']['dirname'] == 'vid' || $picture['Gallery']['dirname'] == 'aud') {		
			$media->embedAsObject($this->Media->file($picture['Gallery']['dirname'].DS.$picture['Gallery']['basename']), array('full' => true)).'<br/>';		
		}
	} else {
		$result = $media->embed($this->Media->file('small'.DS.$picture['Gallery']['dirname'].DS.$picture['Gallery']['basename']), 
			array('full' => true)).' '.$media->embed($this->Media->file('medium'.DS.$picture['Gallery']['dirname'].DS.$picture['Gallery']['basename']), 
			array('full' => true)).' '.$media->embed($this->Media->file('large'.DS.$picture['Gallery']['dirname'].DS.$picture['Gallery']['basename']), 
			array('full' => true)).' '.$media->embed($this->Media->file($picture['Gallery']['dirname'].DS.$picture['Gallery']['basename']), array('full' => true)).'<br/>';		
	}
	echo $result. $this-> Form ->button ('Smazat soubor', array('id' => 'buttonUpload', 'picid' => $picture['Gallery']['id'],'class' => 'form-submit', 'onclick' => 'return ajaxFileUpload(\'/galleries/delete/'.$picture['Gallery']['id'].'\',\'file-upload\',\'upload-wrapper\',\'0\');'));*/
?>
<p>Soubor byl nahrán a je možno jej vložit v editoru.</p>
