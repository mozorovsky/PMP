	<h2><?php echo 'Registrace nového uživatele'?></h2>
	<?php 	    
    	echo $this->Form->create('User', array('id' => 'user-register'));
    	echo $this->Form->input('username',  array( 'label' => __('Username', TRUE).': <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required text',
			'size' => '30',			
			'after' => '<div class="alert">Minimálně 3 znaky; použití mezer je povoleno; interpunkce není povolena s výjimkou teček, spojovníků a podtržítek</div>',
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-name-wrapper'
    			)
		));
    	echo $this->Form->input('init',  array( 'label' => __('E-mail address', TRUE).': <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required text',
			'size' => '30',			
			'after' => '<div class="alert">Zadejte platnou e-mailovou adresu. Na tuto adresu budou posílány všechny e-maily.</div>',
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-mail-wrapper'
    			)
		));?>
		<div class="form-item" id="edit-pass-wrapper">		
  		<?php echo $this->Form->input('npassword',  array( 'label' => __('Password', TRUE).': <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required password-field',
			'size' => '30',		
			'type' => 'password',	
			'after'	=> '<div class="clear"></div>',
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-pass-pass1-wrapper'
    			)
		));				
    	echo $this->Form->input('passwordconf',  array( 'label' => __('Confirm password', TRUE).': <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required password-confirm',
			'size' => '30',	
			'type' => 'password',
			'after'	=> '<div class="alert">'.__('Please choose a password for your account; it must be no more than 30 characters.', true).' </div>',
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-pass-pass2-wrapper'
    			)
		));	?>					
		</div>
	
	<?php echo $this->Form->end(array('label' => __('Create new account', TRUE), 'id' => 'edit-submit'));?>
