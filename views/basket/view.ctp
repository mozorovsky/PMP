<h1>Obsah košíku</h1>
<?php 	echo $this->Session->flash(); ?>
<div class="page">
<div class="home-user-content"> 
<?php if (count($items) > 0) {?>
	<table class="basket" style="font-size:13px;" cellspacing="10" cellpadding="5">
		<tr>
			<th></th>
			<th>Název položky</th>
			<th>Cena za jedn.</th>
			<th>Počet jedn. / balení</th>
			<th>Celkem</th>
		</tr>
		<tr><td colspan="5"><hr /></td></tr>
	<?php 	
		$itemstotal = 0;
		foreach ($items as $item) {
			$countotal = $item['Item']['count'] * $item['Item']['ratio'];
			$itemstotal += $item['Item']['itemtotal'];
			echo  '<tr><td>'.$this->Html->link($this->Html->image('b_drop.png'), '/basket/delete/'.$item['Item']['name'], array('escape' => FALSE)).'</td><td>'.$this->Html->link($item['Item']['title'],'/'.$item['Item']['name']).'</td><td align="right">'.$item['Item']['price'].'</td><td align="right">'.$countotal.' / '.$item['Item']['count'].'</td><td align="right">'.$item['Item']['itemtotal'].'</td></tr><tr><td colspan="5"><hr /></td></tr>';
		}  
			echo '<tr><th></th><th colspan="3">Celková cena s DPH</th><th>'.$itemstotal.',- Kč</th></tr>';?>
	</table>
	<?php
		//echo '<p>'.$this->Html->link('Vyprázdnit košík','/basket/clear').'</p>'; 
		} else {
			echo 'Obsah košíku je prázdný.';
		} 
	?> 		
</div>
</div>
