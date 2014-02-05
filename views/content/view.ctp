<?php $this->addScript($this->Javascript->link('jquery.lightbox-0.5')); ?>
<script type="text/javascript">
    $(function() {
        $('a.gal').lightBox();
    });
	$(document).click(function(event) {
     	if ( !$(event.target).hasClass('popUp') && !$(event.target).hasClass('gmap')) {
        	$(".popUp").hide();    
        }
      });
</script>

	<?php if ($name != 'home' && $category != '') {?>
		<ol id="crumbpath">
				<li class="first"><b><div class="breadcrumb"><?php echo $category ?><span class="separator"> &raquo; </span>
					<span class="crumb"><a href="/<?php echo $area ?>" class="link"><?php echo $area ?></a> </span>
					<?php if (isset($infolink) && $infolink != '') {?>
						<span class="crumb">&raquo; <a href="/<?php echo $infolink ?>" class="link"><?php echo $infolink ?></a> </span>
					<?php } ?>	
				</div></b></li>
		</ol>	
 		<h1><?php echo $content_title ?></h1> 
	<?php } ?>
<div class="page">
<div class="home-user-content"> 
    <?php 	echo $this->Session->flash().'<br/>';
			echo $content;
	if (isset($products)) {?>
		<br/>
		<table align="center" cellspacing="10" cellpadding="1" border="0">
		    <tbody>
			
			<?php
				$i = 0;
				foreach ($products as $product) {
					if ($i == 0) {
						echo '<tr>';
					} ?>
            			<td width="172" style="text-align: center;">
							<a href="/<?php echo $product['Content']['name']?>">
								<img width="154" height="141" src="/media/transfer/img/<?php echo $product['Content']['name']?>.jpg" alt="" /></a><br>
            				<p align="center"><?php echo $product['Content']['title']?> <br/><b><?php echo $this->Number->format($product['Content']['price'],array('places' => 2, 'decimals' => ',', 'thousands' => ' ', 'before' => '', 'escape' => FALSE))?> Kč</b></p></td>	
			<?php	if ($i == 3) {
						echo '</tr>';
						$i = 0;
					} else {
						$i++;	
					}
				}
			?>
			
			</tbody>
		</table>
	<?php }
	
	if ($type == 'product') { ?>
		<!--<hr />
		<p><br /></p>-->
		<div class="itembox">	
		<?php 	echo $this->Form->create('Item', array('url' =>  '/basket/add/'.$name));
				echo $this->Form->hidden('name', array('value' => $name)); 
				echo $this->Form->hidden('title', array('value' => $content_title)); 
				echo $this->Form->hidden('price', array('value' => $price)); 
				echo $this->Form->hidden('ratio', array('value' => $ratio));
				echo $this->Form->hidden('infolink', array('value' => $infolink)); ?>
		<span><label>Cena:</label><strong>&nbsp;<?php echo $this->Number->format($price,array('places' => 2, 'decimals' => ',', 'thousands' => ' ', 'before' => '', 'escape' => FALSE))?> Kč za m<sup>2</sup></strong>	<div class="clear"></div>	
		<label>Balení:</label><strong>&nbsp;<?php echo $this->Number->format($ratio,array('places' => 3, 'decimals' => ',', 'thousands' => ' ', 'before' => '', 'escape' => FALSE))?> m<sup>2</sup> (pouze po cel&eacute;m balen&iacute;)</strong>	<div class="clear"></div></span>	
		
		<?php 	
				/*echo $this->Form->input('price', array( 'label' => 'Cena:', 'value' => $this->Number->format($price,array('places' => 2, 'decimals' => ',', 'thousands' => ' ', 'before' => '', 'escape' => FALSE)).' Kč za m2', 'style' => 'border: 0px; font-weight:bold',
				'after' => '<div class="clear"></div>', 'readonly'=> 'readonly'));
				echo $this->Form->input('price', array( 'label' => 'Balení:', 'value' => $this->Number->format($ratio,array('places' => 3, 'decimals' => ',', 'thousands' => ' ', 'before' => '', 'escape' => FALSE)).' m2 (pouze po celém balení)',
				'style' => 'border: 0px; font-weight:bold', 'size' => '60', 'after' => '<div class="clear"></div>', 'readonly'=> 'readonly'));*/
				
				echo $this->Form->input('floor', array( 'label' => 'Potřebné množství v m<sup>2</sup>:', 
				'after'	=> '<div class="clear"></div>', 
				'onkeyup' => 'this.form.count.value = Math.ceil(this.value/'.$ratio.');this.form.itemtotal.value = Math.ceil( Math.ceil(this.value/'.$ratio.')*'.$ratio.'*'.$price.') + ",- Kč"'));
				echo $this->Form->input('count', array( 'label' => 'Vypočítaný počet balení:', 'id' => 'count', 
				'after'	=> '<div class="clear"></div>', 
				'onkeyup' => 'this.form.itemtotal.value = Math.ceil(this.value*'.$ratio.'*'.$price.') + ",- Kč"'));
				echo $this->Form->input('itemtotal', array( 'label' => 'Celková cena:', 'id' => 'itemtotal', 	
				'after' => '<div class="clear"></div>', 'readonly'=> 'readonly',
				'style' => 'font-size: 16px; font-weight:bold; color: red; border: 0px'));
				echo $this->Form->end('Přídej do košíku');
	 }?> 
	</div>
	<?php
	if ($session->read('Auth.User.role')=='admin') {
		if ($new) {			
			echo '<p>'.$this->Html->link('Vytvořit stránku', '/content/add/' .$name).'</p>';
		} else {
			echo '<p>'.$this->Html->link('Upravit stránku', '/content/edit/' .$name).'</p>';	
		}		
	} ?>
</div>
</div>
