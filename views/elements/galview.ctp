	  <?php if (count($uploads) > 0) { ?>
  <table class="views-table">
  <tbody>
  	<?php
	foreach ($uploads as $upload):
	?>
		  <tr>
                <td>
					<?php echo $this->Time->format('j.n.Y H:i:s',$upload['Gallery']['created']);?>
				</td>
                <td>
					<?php if ($upload['Gallery']['dirname'] != 'img') {
							echo $this->Html->link($upload['Gallery']['basename'], '/media/transfer/'.$upload['Gallery']['dirname'].'/'.$upload['Gallery']['basename']);
						} else {
							echo $media->embed($this->Media->file('large'.DS.$upload['Gallery']['dirname'].DS.$upload['Gallery']['basename']));
						}
					?>  
            	</td>
                <td>					
					<?php echo $this->Html->link(__('delete', TRUE), '/galleries/delete/'.$upload['Gallery']['id'].'/nonajax');?>
				</td>
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
	  
	  