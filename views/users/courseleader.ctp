<h2><?php echo 'Kontakt na vedoucího kurzu: '?></h2>
<?php 	echo $this->Session->flash(); ?>									
<?php 	echo $this->Form->create('Contact', array('url' =>  '/users/courseleader'));
		echo $this->Form->input('titul',  array( 'label' => 'Titul:', 
			'class' => 'form-text',
			'size' => '60',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('jmeno',  array( 'label' => 'Jméno: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required text',
			'size' => '60',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('prijmeni',  array( 'label' => 'Příjmení: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required text',
			'size' => '60',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('ulice',  array( 'label' => 'Ulice:', 
			'class' => 'form-text',
			'size' => '60',
			'after'	=> '<div class="clear"></div>',			
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('mesto',  array( 'label' => 'Město:', 
			'class' => 'form-text',
			'size' => '60',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('psc',  array( 'label' => 'PSČ:', 
			'class' => 'form-text',
			'size' => '60',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('telefon',  array( 'label' => 'Telefon:', 
			'class' => 'form-text',
			'size' => '60',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('mobil',  array( 'label' => 'Mobil: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text',
			'size' => '60',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('email',  array( 'label' => 'Email: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text',
			'size' => '60',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('skype',  array( 'label' => 'Skype:', 
			'class' => 'form-text',
			'size' => '60',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));

	 	echo $this->Form->end(array('label' => __('Save', TRUE), 'id' => 'edit-submit'));?>
