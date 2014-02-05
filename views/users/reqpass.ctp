	<h2><?php echo __('Request new password')?></h2>
	<p>Vložte jméno uživatele nebo email a bude Vám vygenerováno nové heslo a zasláno emailem. Po přihlášení si jej změňte v sekci - údaje uživatele.</p>
	<p>Pokud si nepamatujete jméno uživatele ani email, potom napište na info(zavinac)kurzyalfa.cz a my Vám pošlem nové heslo.</p>
	<?php 
	    //echo $this->Session->flash('auth');
		echo $this->Session->flash();
    	echo $this->Form->create('User', array('id' => 'user-pass'));
    	echo $this->Form->input('username',  array( 'label' => __('Username or e-mail address', TRUE).
			': <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required',
			'id' => 'edit-name',
			'size' => '40',			
			'div' => array(
       			'class' => 'form-item',
				'id' => 'edit-name-wrapper'
    			),
			'after'	=> '<div class="clear"></div>'	
		));
		echo $this->Form->end(array('label' => __('E-mail new password', TRUE), 'id' => 'edit-submit'));	
	?>
