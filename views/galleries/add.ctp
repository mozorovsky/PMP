<div class="galleries form">
	<h2><?php __('Nahrát obrázky');?></h2>
	<?php
		echo $this->Form->create('Gallery', array('type' => 'file'));
		echo $this->Form->input('file', array(
			'type' => 'file', 
			'label' => false, 'div' => false,
			'class' => 'fileUpload', 
			'multiple' => 'multiple'
		));		
		echo $this->Form->button('Nahrát', array('type' => 'submit', 'id' => 'px-submit'));
		echo $this->Form->button('Zrušit', array('type' => 'reset', 'id' => 'px-clear'));?>
		<input type="hidden" name="data[Gallery][flat_id]" id="GalleryFlat_id" value="<?php echo $flat_id ?>"/>
		<?php echo $form->end();
	?>
</div>

<?php echo $this->Html->link(
    'Zpět',
    array('controller' => 'maintop', 'action' => 'index')
);?>
 
<script type="text/javascript">
	$(function(){
		$('.fileUpload').fileUploader();
	});
</script>
 