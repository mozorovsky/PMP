<h2>Smazat existující stránku</h2><br/>
<?php 	echo $this->Form->create(NULL);
	echo $this->Form->input('Content.name', array( 'label' => 'existující stránky: ', 'options' => $contents, 
		'onChange' => 'this.form.submit()', 'empty' => ''));
	if (isset($content)) {
		echo '<p>'.$this->Html->link('smazat','/content/delete/'.$content['Content']['id'], null, 'Opravdu smazat tuto stránku?').'</p>';	
	}?>
<p></p>
<?php if (isset($content)) { ?>
<h1 class="entry-title"><?php echo $content['Content']['title'] ?> </h1>
<div class="page">
	<div class="home-user-content"> 
    <?php echo $content['Content']['content'];;
	if ($session->read('Auth.User.username')=='Milos_P') {
		echo '<p>'.$this->Html->link('Upravit stránku', '/content/edit/' .$content['Content']['name']).'</p>';	
	} ?>
  </div>
</div>
<?php } ?>
