<h1>Správa objednávek</h1>
<div class="page">
<div class="home-user-content"> 

<?php if (count($orders) > 0) { ?>

  <table style="font-size:13px;" cellspacing="10" cellpadding="5">
  <tr>
  	<th>Id</th>
	<th>Celková cena</th>
	<th>Firma</th>
	<th>Jméno</th>
	<th>Stav</th>
	<th>Vytvořeno</th>
	<!--<th>Změněno</th>-->
  </tr>
  <tr><td colspan=6""><hr /></td></tr>
  <tbody>
  	<?php
	foreach ($orders as $order):?>

		<tr>
			<td><?php echo $this->Html->link($order['Order']['id'], '/admin/view/'.$order['Order']['id'])?></td>
			<td align="right"><?php echo $order['Order']['price']?></td>
			<td><?php echo $order['Contact']['firma']?></td>
			<td><?php echo $this->Html->link($order['Contact']['jmeno'].' '.$order['Contact']['prijmeni'], '/admin/view/'.$order['Order']['id'])?></td>
			<td><?php echo $order['Order']['state']?></td>
			<td><?php echo $this->Time->format('j.m.Y G:i:s',$order['Order']['created'])?></td>
			<!--<td><?php echo $this->Time->format('j.m.Y G:i:s',$order['Order']['modified'])?></td>	-->
		</tr>		
		<?php endforeach; ?>	 
      </tbody>
</table>
<?php } else {?>
	<div class="view-empty">
      <p><?php echo __('No records');?></p>
    </div>	
<?php }?>	

    <div class="item-list">
	  <ul class="pager">
	  <li class="pager-next">
		<?php echo $this->Paginator->first(__('« first',true), array(), null, array('class' => 'disabled'));?>
	</li>
	<li class="pager-last last">
		<?php if ($this->Paginator->hasPrev()) {
			echo $this->Paginator->prev(__('‹ previous',true), array(), null, array('class' => 'disabled'));
		}?>
	</li>
	<?php echo $this->Paginator->numbers(array('separator'=>'', 'tag' => 'li', 'class' => 'pager-item'))?> 

	<li class="pager-next">
		<?php if ($this->Paginator->hasNext()) {
			echo $this->Paginator->next(__('next ›',true), array(), null, array('class' => 'disabled'));
		}?>
	</li>
	<li class="pager-last last">
		<?php echo $this->Paginator->last(__('last »',true), array(), null, array('class' => 'disabled'));?>

	</li>
	</ul>
	</div>
</div></div>	
	  
	  