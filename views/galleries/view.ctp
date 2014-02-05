<html>
<head>
<meta charset="UTF-8" />
	  <?php echo $this->Html->css(array('style'));
	  echo $this->Javascript->codeBlock(
	  	"function selectURL(url) { 
            if (url == '') return false; 

            field = window.top.opener.browserWin.document.forms[0].elements[window.top.opener.browserField];
             field.value = url; 
            if (field.onchange != null) field.onchange(); 
            window.top.close(); 
            window.top.opener.browserWin.focus(); 
        }" 
	  );?>
</head>
<body id="gal">	 <p></p> 
<?php	echo $this->Form->input('contents', array('options' => $contents, 'onchange' => 'selectURL("/content/view/" + this.value)', 'empty' => '', 
			'label' => '&nbsp;Linky na existující stránky', 'after' => '<div class="clear"></div>'));
		echo $this->Form->input('uploads', array('options' => $uploads, 'onchange' => 'selectURL("/media/transfer/" + this.value)', 'empty' => '', 
			'label' => '&nbsp;Linky na ostatní soubory')); 
 if (count($imgs) > 0) { ?>
	<p></p>
  <table class="views-table">
  <tbody>
  	<?php
	$i = 0;
	foreach ($imgs as $img):
	?>
		  <tr>
                <td>
					<?php echo $this->Time->format('j.n.Y H:i:s',$img['Gallery']['created']);?>
					<br /><?php echo $img['Gallery']['basename'];?>
				</td>
                <td>
					<?php if ($img['Gallery']['dirname'] != 'img') {
							echo $this->Html->link($img['Gallery']['basename'], '/media/transfer/'.$img['Gallery']['dirname'].'/'.$img['Gallery']['basename']);
						} else {
							//echo $this->Html->image('/media/transfer/'.$img['Gallery']['dirname'].'/'.$img['Gallery']['basename'], 
								//	array('onclick' => 'selectURL("'.$img['Gallery']['dirname'].DS.$img['Gallery']['basename'].'");'));	
							echo $media->embed($this->Media->file('medium'.DS.$img['Gallery']['dirname'].DS.$img['Gallery']['basename']), 
							array('style' => 'float: left; margin-right: 10px;', 
							'onclick' => 'selectURL("/media/" + document.getElementById(\'dimsel'.$i.'\').value + "'.$img['Gallery']['dirname'].'/'.$img['Gallery']['basename'].'");'));
						}
					?> 
					<select id="dimsel<?php echo $i?>">
						<option value="transfer/">původní velikost</option>
						<option value="filter/small/">40x30</option> 
						<option value="filter/medium/">80x60</option> 
						<option value="filter/large/">240x180</option> 						 
            		</select>
				</td>
                <td>					
					<?php echo $this->Html->link(__('delete', TRUE), '/galleries/delete/'.$img['Gallery']['id'].'/nonajax');?>
				</td>
              </tr>
		<?php $i++;
			endforeach; ?>	  
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
</body>
</html>	  
	  