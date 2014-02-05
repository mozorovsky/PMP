<?php
class Gallery extends AppModel {
	var $name = 'Gallery';
	//media plugin behaviors
	var $actsAs = array(
		'Media.Transfer',
		'Media.Coupler',
		'Media.Generator'
	);
	//file validation which only allowed jpeg and png to be uploaded
	var $validate = array(
		'file' => array(
			'size'       => array('rule' => array('checkSize', '250M'), 'message' => 'The selected file could not be uploaded.')
			//'pixels'     => array('rule' => array('checkPixels', '640x480')),
			/*'mimeType' => array(
				'rule' => array('checkMimeType', false, array( 'image/jpeg', 'image/png' ,'image/gif', 'application/pdf', 'application/pdf', 'audio/mpeg3', 
				'text/plain', 'video/mpeg', 'video/avi', 'application/msword', 'application/mspowerpoint', 'application/x-msexcel', 'application/octet-stream')),
				'message' => 'The selected file could not be uploaded.'
			)*/
		)
	);
	
	function updatePicture($id, $propertyId, $delta) {
		$this->id = $id;
		$this->saveField('property_id',$propertyId);
		$this->saveField('delta',$delta);
	}
	
	function upload($property_id, $picture) {		
		if (isset($property_id)) {
			$picture['property_id'] = $property_id;
		}
		if (!empty($picture)) {
			$this->create();
			$this->save($picture);
		}
	}
	
	function detePropertyImg ($id) {
		$this->deleteAll(array('Gallery.property_id' => $id),true, true);
	}

	 function beforeDelete($cascade = true) {
		if (!$cascade ) {
			return true;
		}

		$result = $this->find('first', array(
			'conditions' => array($this->primaryKey => $this->id),
			'fields'	 => array('dirname', 'basename'),
			'recursive'  => -1
		));
		if (empty($result)) {
			return false;
		}
		if ($result[$this->alias]['dirname'] != 'img') {
			return true;
		}

		$pattern  = MEDIA_FILTER . "*/";
		$pattern .= $result[$this->alias]['dirname'] . '/';
		$pattern .= pathinfo($result[$this->alias]['basename'], PATHINFO_FILENAME);

		$files = glob("{$pattern}.*");

		$name = Mime_Type::guessName($result[$this->alias]['basename']);
		$versions = array_keys(Configure::read('Media.filter.' . $name));

		if (count($files) > count($versions)) {
			$message  = 'MediaFile::beforeDelete - ';
			$message .= "Pattern `{$pattern}` matched more than number of versions. ";
			$message .= "Failing deletion of versions and record for `Media@{$this->id}`.";
			CakeLog::write('warning', $message);
			return false;
		}

		foreach ($files as $file) {
			$File = new File($file);

			if (!$File->delete()) {
				return false;
			}
		}
		return true;
	}

}
?>