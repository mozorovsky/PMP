<h1>Údaje objednávky</h1>
<?php 	echo $this->Session->flash(); ?>
<div class="page">
<div class="home-user-content"> 
<div class="ordfill">Fakturační adresa									
<?php 	echo $this->Form->create('Order');
		echo $this->Form->hidden('state', array('value' => 'nová'));
		echo $this->Form->hidden('expedition', array('value' => date('Y-m-d', strtotime('+10 days'))));
		echo $this->Form->input('Contact.firma',  array( 'label' => 'Název firmy:', 
			'class' => 'form-text',
			'size' => '40',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.ico',  array( 'label' => 'IČO:', 
			'class' => 'form-text',
			'size' => '20',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.dic',  array( 'label' => 'DIČ:', 
			'class' => 'form-text',
			'size' => '20',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.titul',  array( 'label' => 'Titul:', 
			'class' => 'form-text',
			'size' => '20',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.jmeno',  array( 'label' => 'Jméno: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required text',
			'size' => '40',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('Contact.prijmeni',  array( 'label' => 'Příjmení: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required text',
			'size' => '40',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('Contact.ulice',  array( 'label' => 'Ulice:', 
			'class' => 'form-text',
			'size' => '40',
			'after'	=> '<div class="clear"></div>',			
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.mesto',  array( 'label' => 'Město:', 
			'class' => 'form-text',
			'size' => '40',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.okres',  array( 'label' => 'Okres:', 
			'class' => 'form-text',
			'size' => '40',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('Contact.psc',  array( 'label' => 'PSČ:', 
			'class' => 'form-text',
			'size' => '20',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.telefon',  array( 'label' => 'Telefon:', 
			'class' => 'form-text',
			'size' => '20',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.mobil',  array( 'label' => 'Mobil: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text',
			'size' => '20',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.email',  array( 'label' => 'Email: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text',
			'size' => '20',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		?>
		<!--<?php echo $this->Ajax->link(
			'Dodací adresa: ',
			array('controller' => 'orders', 'action' => 'get_a_address'),
			array('update' => 'a_adress', 'indicator' => 'picloading')
	);
	echo $this->Html->image('status-active.gif', array('id' => 'picloading', 'style' => 'display:none;'));?>
	<div class="alert">Vyplňte pokud se liší od fakturační adresy.</div>
	<div id="a_adress"></div>-->
<p><br /></p>	
<p>
Dodací adresa se líši od fakturační <input type="checkbox" name="data[Contact][usealt]" id="a_check" onclick="if (this.checked) {document.getElementById('fa').style.display = 'block'} else {document.getElementById('fa').style.display = 'none'}"/>
</p>
<div style="display: none;" id="fa">Dodací adresa
<?php	echo $this->Form->input('Contact.a_firma',  array( 'label' => 'Název firmy:', 
			'class' => 'form-text',
			'size' => '40',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.a_titul',  array( 'label' => 'Titul:', 
			'class' => 'form-text',
			'size' => '20',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.a_jmeno',  array( 'label' => 'Jméno:', 
			'class' => 'form-text required text',
			'size' => '40',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('Contact.a_prijmeni',  array( 'label' => 'Příjmení:', 
			'class' => 'form-text required text',
			'size' => '40',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('Contact.a_ulice',  array( 'label' => 'Ulice:', 
			'class' => 'form-text',
			'size' => '40',
			'after'	=> '<div class="clear"></div>',			
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.a_mesto',  array( 'label' => 'Město:', 
			'class' => 'form-text',
			'size' => '40',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('Contact.a_okres',  array( 'label' => 'Okres:', 
			'class' => 'form-text',
			'size' => '40',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('Contact.a_psc',  array( 'label' => 'PSČ:', 
			'class' => 'form-text',
			'size' => '20',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));?>

</div>	
		
</div>
<p><br /></p>
<div class="ordfill">Doprava a způsob platby	
<p><br /></p>
<div style="float: left;">
	<p>Zvolte způsob platby:</p>
	<div class="form-item"><label for="OrderPayconditionD">Dobírka</label>
	<input type="radio" name="data[Order][paycondition]" id="OrderPayconditionD" value="D"  /></div>
	<div class="clear"></div>
	<div class="form-item"><label for="OrderPayconditionP">Převod na účet</label>
	<input type="radio" name="data[Order][paycondition]" id="OrderPayconditionP" value="P"  />	</div>
	
</div>	
	
<div style="margin-left: 120px; display: inline-block;">
<p>Zvolte způsob dopravy:</p>
	<div class="form-item"><label for="OrderTransportO">Osobně na prodejně</label>
	<input type="radio" name="data[Order][transport]" id="OrderTransportD" value="O" onclick="if (this.checked) {document.getElementById('recount').style.display = 'none';document.getElementById('transportinfo').style.display = 'none'}" /></div>
	<div class="clear"></div>
	<div class="form-item"><label for="OrderTransportP">Přepravce</label>
	<input type="radio" name="data[Order][transport]" id="OrderTransportP" value="P"  onclick="if (this.checked) {document.getElementById('transportinfo').style.display = 'block';document.getElementById('calctr').click(); document.getElementById('recount').style.display = 'block'}"/>	</div>
	<div class="form-item"><label for="OrderTransportP" id="recount" class="buttonlink" style="display: none">Přepočítat</label>
	<?php echo $this->Ajax->link(
			'',
			array('controller' => 'orders', 'action' => 'get_transport_price'),
			array('data' => '{ Model: { city: $(\'#ContactMesto\').val(), psc: $(\'#ContactPsc\').val(), street: $(\'#ContactUlice\').val(), okres: $(\'#ContactOkres\').val(), check:  $(\'#a_check\').is(\':checked\'), a_city: $(\'#ContactAMesto\').val(), a_psc: $(\'#ContactAPsc\').val(), a_street: $(\'#ContactAUlice\').val(), a_okres: $(\'#ContactAOkres\').val() } }', 
			'update' => 'transportinfo', 'indicator' => 'picloading', 'id' => 'calctr')
	);?>
	</div>
	<?php 	echo $this->Html->image('status-active.gif', array('id' => 'picloading', 'style' => 'display:none;'));
			echo $this->Form->hidden('transportprice', array('value' => 0));?>
	
</div>	<p><br /></p>
	<div id="transportinfo"></div>
</div>
<p><br /></p>
<div class="ordfill">Poznámka
<p><br /></p>
	<?php echo $this->Form->textarea('usercomment', array('cols' => '60', 'rows' => '10', 'style' => 'margin-left: 20px;'));?>	
</div>
<p><br /></p>

<?php	echo $this->Form->end(array('label' => __('Save', TRUE), 'id' => 'edit-submit'));
		?>
</div>
</div>