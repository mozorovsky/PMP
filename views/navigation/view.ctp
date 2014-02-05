<?php if ($session->read('Auth.User.role')=='admin') { ?>
<h1>Navigace</h1>
<br/>
<?php echo $this->Form->create(null);
	  echo $this->Form->input('Navigation.category', array( 'label' => 'Kategorie:', 'onchange' => 'this.form.submit()', 'after'=> '<div class="clear"></div>',	
	  	'options' => array('LAMINÁTOVÉ PODLAHY'=>'LAMINÁTOVÉ PODLAHY', 'DŘEVĚNÉ PODLAHY'=>'DŘEVĚNÉ PODLAHY','VINYLOVÉ PODLAHY'=>'VINYLOVÉ PODLAHY'))); 
	  echo $this->Form->hidden('Navigation.initcat');
		
		if ($this->Form->data['Navigation']['initcat'] != 'users' ) {?>

<br />
<?php echo $this->Form->input('Navigation.area', array( 'label' => 'Navigace pro menu: ', 'onchange' => 'this.form.submit()', 
			'options' => $areas)); 
		//echo $this->Form->end('Zobrazit', array('style' => 'hidden')); 	
} ?>
<br />
<table>	
<?php $index = 0;
	foreach ($navigations as $navigation): $index++;?>
	<tr>
		<td><?php echo $navigation['Navigation']['title']?></td>
		<td><?php echo $this->Html->link('upravit', '/navigation/edit/'.$navigation['Navigation']['id']) ?></td>
		<td><?php echo $this->Html->link('smazat', '/navigation/delete/'.$navigation['Navigation']['id']) ?></td>
		<td><?php echo $this->Html->link('přidat', '/navigation/add/'.$navigation['Navigation']['category'].'/'.$navigation['Navigation']['area'].'/'.$index) ?></td>
		<td><?php echo $this->Form->hidden('Order.'.$index.'.id', array('value' => $navigation['Navigation']['id']));
			echo $this->Form->input('Order.'.$index.'.delta', array('label' => '', 'value' => $navigation['Navigation']['delta'], 				
				'options' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9',
				'10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20'))) ?></td>
	</tr>	
<?php endforeach; 
		if ($index==0) {
			echo $this->Html->link('přidat', '/navigation/add/'.$this->Form->data['Navigation']['category'].'/'.$this->Form->data['Navigation']['area'].'/0');
		} else {
			echo $this->Form->end(array('label' => 'Uložit pořadí',  'name' => 'order'));
		}?>
</table>

	
<?php } ?>
