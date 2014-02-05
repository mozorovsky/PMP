<h1><?php echo $content_title?></h1>
<div class="page">
<div class="home-user-content"> 

	  <?php if (count($products) > 0) { ?>
  <table class="views-table">
  <tbody>
  	<?php
	foreach ($products as $product):?>

		<tr>
			<td class="corsecol"><a href="/<?php echo $product['Content']['name']?>"><img src="/media/filter/small/img/<?php echo $product['Content']['name']?>.jpg"/></a></td>
			<td>&nbsp;&nbsp;<a href="/<?php echo $product['Content']['name']?>"><?php echo $product['Content']['title']?></a></td>	
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
	  
	  