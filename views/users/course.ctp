<script type="text/javascript">
$(document).click(function(event) {
     	if ( !$(event.target).hasClass('popUp') && !$(event.target).hasClass('gmap')) {
        	$(".popUp").hide();    
        }
      });
</script>	  
<h2>Údaje o kurzu<?php if (isset($user_id)) {echo ' pro id-'.$user_id;}?>: </h2>
<?php 	echo $javascript->link(array(
            'date.js', 
            'jquery.datePicker.js', 
            'cake.datePicker.js' 
            )); 

echo $this->Session->flash(); ?>									
<?php if ($allow == 'true') {
		$formurl = '/users/course';
		if (isset($user_id)) {
			$formurl = '/users/course/'.$user_id;
		}
		echo $this->Form->create('Course', array('url' =>  $formurl, 'id' => 'courseform'));
		echo $this->Form->input('pocet',  array( 'label' => 'Kolik běhů jste dosud pořádali:', 
			'options' => array('0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',
				'11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20',
				'21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30',
				'31'=>'21','32'=>'32','33'=>'33','34'=>'34','35'=>'35','36'=>'36','37'=>'37','38'=>'38','39'=>'39','40'=>'40',
				'41'=>'41','42'=>'42','43'=>'43','44'=>'44','45'=>'45','46'=>'46','47'=>'47','48'=>'48','49'=>'49','50'=>'50',
				'51'=>'51','52'=>'52','53'=>'53','54'=>'54','55'=>'55','56'=>'56','57'=>'57','58'=>'58','59'=>'59','60'=>'60',
				'61'=>'61','62'=>'62','63'=>'63','64'=>'64','65'=>'65','66'=>'66','67'=>'67','68'=>'68','69'=>'69','70'=>'70',
				'71'=>'71','72'=>'72','73'=>'73','74'=>'74','75'=>'75','76'=>'76','77'=>'77','78'=>'78','79'=>'79','80'=>'80',
				'81'=>'81','82'=>'82','83'=>'83','84'=>'84','85'=>'85','86'=>'86','87'=>'87','88'=>'88','89'=>'89','90'=>'90',
				'91'=>'91','92'=>'92','93'=>'93','94'=>'94','95'=>'95','96'=>'96','97'=>'97','98'=>'98','99'=>'99','100'=>'100'),
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('pouziti',  array( 'label' => 'K přednáškám používáte:', 
			'options' => array('řečník' => 'řečník','DVD' => 'DVD','kombinace řečník a DVD' => 'kombinace řečník a DVD'),
			'empty' => '',
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));	?>
		<label for="CourseIniciativa2013">Zapojíte se do iniciativy 2013:</label>	
<?php	echo $this->Form->checkbox('iniciativa2013', array('hiddenField' => false, 'label' => 'Zapojíte se do iniciativy 2013:'));?>

<h2>Údaje o kurzu, které se zobrazí na webu: </h2>		

<?php	echo $this->Form->input('kraj',  array( 'label' => 'Kraj:', 
			'options' => array('Jihočeský'=>'Jihočeský','Jihomoravský'=>'Jihomoravský','Karlovarský'=>'Karlovarský','Královehradecký'=>'Královehradecký',
						'Liberecký'=>'Liberecký','Moravskoslezský'=>'Moravskoslezský','Olomoucký'=>'Olomoucký','Pardubický'=>'Pardubický',
						'Plzeňský'=>'Plzeňský','Praha'=>'Praha','Středočeský'=>'Středočeský','Ústecký'=>'Ústecký','Vysočina'=>'Vysočina','Zlínský'=>'Zlínský'),
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));

		echo $this->Form->input('mesto',  array( 'label' => 'Město: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text required text',
			'size' => '70',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		echo $this->Form->input('adresa',  array( 'label' => 'Ulice:', 
			'class' => 'form-text',
			'size' => '70',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		
		if (isset($this->data['Course']['mesto'])) {
			$location = $this->data['Course']['adresa'].','.$this->data['Course']['mesto'].','.$this->data['Course']['kraj'].',CZ';	
		} else {
			$location = 'czech republic';
		}?>
		<div class="alert">Vyplňte, pokud chcete zobrazit místo konání v Google maps. Po uložení zkontrolujte <a class="gmap" style="cursor:pointer" onclick="createPopUp();">zde</a></div>
		<script type="text/javascript">	
	function createPopUp()
		{
			var div = document.createElement('div');
			div.innerHTML = '<div class="popUp"><iframe width="500" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=<?php echo $location?>&amp;t=m&amp;z=15&amp;iwloc=false&amp;output=embed"></iframe></div>';
			document.body.appendChild(div.firstChild);
		}  
	</script>		
<?php	echo $this->Form->input('poradatel',  array( 'label' => 'Pořadatel: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text',
			'size' => '70',
			'after'	=> '<div class="clear"></div>',			
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('kont_osoba',  array( 'label' => 'Kontaktní osoba: <span class="form-required" title="'.__('This field is required.',TRUE).'">*</span>', 
			'class' => 'form-text',
			'size' => '70',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('telefon',  array( 'label' => 'Telefon:', 
			'class' => 'form-text',
			'size' => '70',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('mobil',  array( 'label' => 'Mobil:', 
			'class' => 'form-text',
			'size' => '70',		
			'after'	=> '<div class="clear"></div>',	
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('mail',  array( 'label' => 'Email:', 
			'class' => 'form-text',
			'size' => '70',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('web',  array( 'label' => 'WWW:', 
			'class' => 'form-text',
			'size' => '70',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $this->Form->input('druh',  array( 'label' => 'Druh kurzu:', 
			'options' => array('dopolední'=>'dopolední','polední'=>'polední','odpolední'=>'odpolední','večerní'=>'večerní','pro mládež'=>'pro mládež',
								'pro studenty'=>'pro studenty','anglicky'=>'anglicky'),
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));		?>
		<label for="CourseKatolicky">Katolický:</label>	
<?php	echo $this->Form->checkbox('katolicky', array('hiddenField' => false));?>
		<div class="clear"></div>
<?php	echo $this->Form->input('misto',  array( 'label' => 'Místo:', 
			'class' => 'form-text',
			'size' => '70',	
			'after'	=> '<div class="clear"></div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));
		echo $datePicker->picker('zahajeni',  array( 'label' => 'Datum zahájení a čas zahájení:', 'empty' => TRUE, 'separator'=>' ',
			'monthNames' => array(	'01' => 'leden', '02' => 'únor', '03' => 'březen', '04' => 'duben', '05' => 'květen', '06' => 'červen', 
									'07' => 'červenec', '08' => 'srpen', '09' => 'září', '10' => 'říjen', '11' => 'listopad', '12' => 'prosinec')));?>
		<div class="clear"></div>									
<?php	echo $this->Form->input('cas',  array( 'label' => '', 
			'type' => 'time',
    		'timeFormat'=>'24',
    		'separator'=>':',
			'after'	=> '<div class="clear"></div><div class="alert">Pokud pořádáte kurz např. jen jednou ročně, nebo se chystáte kurz zahájit v blízké budoucnosti, ale ještě neznáte datum a čas zahájení kurzu, je možné mít zveřejněný kontakt na pořadatele. Pokud by vás zájemce o kurz kontaktoval, můžete si kontakt na něj uložit a pozvat jej v okamžiku zahájení dalšího běhu kurzu. </div>',		
			'div' => array(
       			'class' => 'form-item',
    			)
		));?>
		<label for="CourseOnweb">Zobrazit na web:</label>	
<?php	echo $this->Form->checkbox('onweb', array('hiddenField' => false, 'label' => 'Zobrazit na web:'));?>
		<div class="clear"></div>
		<div class="alert">Údaje o Vašem kurzu mohou být dlouhodobě veřejně přístupné. Pokud kurz pořádáte např. 1x ročně, můžete sami rozhodnout o tom, s jakým předstihem před zahájením kurzu chcete údaje zveřejnit, případně kdy informaci o pořádání kurzu z veřejně přístupné části webu stáhnete.<br/>Pokud nemáte výhled na pořádání kurzu, kontaktní informace z veřejné části webu prosím odškrtnutím stáhněte. Informaci o kurzu lze znovu zveřejnit, jakmile další běh kurzu začnete znovu připravovat.</div>
<?php 	echo $this->Form->end(array('label' => __('Save', TRUE), 'id' => 'edit-submit'));
	}?>
