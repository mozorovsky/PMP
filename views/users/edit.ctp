<?php echo $this->Session->flash(); ?>									
<h2><?php echo ' '//$this->data['User']['username']?></h2>
<?php echo $this->Form->create('User', array('id' => 'user-register'));
	  //echo $this->Form->hidden('username', array('value' => $this->data['User']['username']));

		echo $this->Form->input('init',  array( 'label' => __('E-mail address', TRUE).': <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required text',
			'size' => '30',			
			'after' => '<div class="alert">Zadejte platnou e-mailovou adresu. Na tuto adresu budou posílány všechny e-maily.</div>',
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-mail-wrapper'
    			)
		));?>
  		<?php echo $this->Form->input('npassword',  array( 'label' => __('Password', TRUE).': ', 
			'class' => 'form-text password-field',
			'size' => '30',		
			'type' => 'password',	
			'after'	=> '<div class="clear"></div>',
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-pass-pass1-wrapper'
    			)
		));				
    	echo $this->Form->input('passwordconf',  array( 'label' => __('Confirm password', TRUE).': ', 
			'class' => 'form-text password-confirm',
			'size' => '30',	
			'type' => 'password',
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-pass-pass2-wrapper'
    			)
		));?>
		 <div class="alert"><?php echo __('To change the current user password, enter the new password in both fields.')?></div>
		<?php if ($session->read('Auth.User.role')=='admin'){
			echo $this->Form->input('active', array (
  			'options' => array(	'0'=> ' '.__('Blocked',true),'1'=> ' '.__('Active',true)),			
			//'class' => 'form-radio',
			//'label' => __('Status', TRUE).': ',
			'separator' => '<div class="clear"></div>',
			'after'	=> '<div class="clear"></div>',
			'type' => 'radio',
			'legend' => false,
			'div' => array(				
       			'class' => 'form-item',
    			)
			));
			echo '<label for="UserInfomenu">Zpřístupnit materiály: </label>'.$this->Form->checkbox('infomenu').'<div class="clear"></div>';			
			echo $this->Form->input('role', array ('label' => 'Role:',
  				'options' => array('user' => 'Soukromý uživatel', 'editor_alfa' => 'Editor stránek Kurzy Alfa', 'editor_youth' => 'Editor stránek Alfa pro mládež', 
									'editor_catholic' => 'Editor stránek Alfa v katolické cirkvi', 'admin' => 'Administrátor'),	
				'after'	=> '<div class="clear"></div>',							
				'div' => array(				
       				'class' => 'form-item',
    			)
			));	 
		}?>					
		

<?php echo $this->Form->end(array('label' => __('Save', TRUE), 'id' => 'edit-submit'));?>
