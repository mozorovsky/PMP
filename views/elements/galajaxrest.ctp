<?php	
	$next = $delta + 1;
	$result = $media->embed($this->Media->file('medium'.DS.$picture['Gallery']['dirname'].DS.$picture['Gallery']['basename']), array('full' => true));
	echo '	<input type="hidden" name="data[Gallery]['.$delta.'][id]" id="GalleryId" value="'.$picture['Gallery']['id'].'"/>
			<input type="hidden" name="data[Gallery]['.$delta.'][dirname]" id="GalleryDirname" value="'.$picture['Gallery']['dirname'].'"/>
			<input type="hidden" name="data[Gallery]['.$delta.'][basename]" id="GalleryBasename" value="'.$picture['Gallery']['basename'].'"/>'.
			$result. $this-> Form ->button ('Smazat soubor', array('id' => 'buttonUpload', 'class' => 'form-submit', 'onclick' => 'return ajaxFileUpload(\'/galleries/delete/'.$picture['Gallery']['id'].'\',\'edit-field-alt-pics-'.$delta.'-upload\',\'edit-field-alt-pics-'.$delta.'-upload-wrapper\',\''.$delta.'\');')).'<input type="hidden" name="data[Gallery]['.$next.'][delta]" id="GalleryDelta" value="'.$next.'"/>	
	<div class="form-item" id="edit-field-alt-pics-'.$next.'-upload-wrapper">
 	<div class="filefield-upload clear-block">
		<input type="file" name="data[Gallery]['.$next.'][file]" accept="png,gif,jpg,jpeg" class="form-file" id="edit-field-alt-pics-'.$next.'-upload" size="22"/>'.
		$this-> Form ->button ('Nahrávání souborů', 
	 	array('id' => 'buttonUpload', 'class' => 'form-submit', 'onclick' => 'return ajaxFileUpload(\'/galleries/add\',\'edit-field-alt-pics-'.$next.'-upload\',\'edit-field-alt-pics-'.$next.'-upload-wrapper\',\''.$next.'\');')).'</div>
 <div class="description">Maximální velikost souboru: <em>300 KB</em><br />Povolené typy souborů: <em>png gif jpg jpeg</em><br />Obrázky větší než 640x480 pixelů budou zmenšeny</div>
</div>';
?>
