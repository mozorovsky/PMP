	<h2><?php echo 'Účet uživatele' ?></h2>
	<?php 
	    echo $this->Session->flash('auth');
		echo $this->Session->flash();
    	echo $this->Form->create('User', array('id' => 'user-login'));
		echo $this->Form->input('username',  array( 'label' => 'Jméno uživatele: <span class="form-required" title="Toto pole je povinné">*</span>', 
			'class' => 'form-input',
			'size' => '30',	
			'after'	=> '<div class="clear"></div>'
		));
		echo $this->Form->input('password',  array( 'label' => 'Heslo : <span class="form-required" title="Toto pole je povinné">*</span>', 
			'class' => 'form-input',
			'size' => '30',	
			'after'	=> '<div class="clear"></div>'		
		/*	'after' => '<div class="description">'.__('Enter the password that accompanies your username.',true).'</div>',
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-pass-wrapper'
    			)*/
		));		
		echo $this->Form->end(array('label' => 'Přihlásit se', 'id' => 'edit-submit'));	
	?>
