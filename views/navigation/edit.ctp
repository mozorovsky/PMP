<h2>Editace navigace</h2>

<?php if (isset($this->Form->data['Navigation']['id'])) {
	echo $this->Form->create('Navigation', array('url' =>  '/navigation/edit/'.$this->Form->data['Navigation']['id']));		
} else {
	echo $this->Form->create('Navigation', array('url' =>  '/navigation/edit'));	
}
  	echo $this->Form->input('title', array('label' => 'Nadpis:', 'after' => '<div class="clear"></div>'));
	echo $this->Form->hidden('id');
	echo $this->Form->hidden('block');
	echo $this->Form->hidden('category');
	echo $this->Form->hidden('area');
	echo $this->Form->input('contents', array( 'label' => 'Existující stránky: ', 'options' => $contents, 
		'onClick' => 'document.getElementById("NavigationHref").value="/" + this.value', 	'empty' => '', 'after'	=> '<div class="clear"></div>'));
	echo $this->Form->input('href', array('label' => 'Odkaz: ', $this->Form->data['Navigation']['id']));
?>
<br />
<?php	echo $this->Form->end('Uložit').'<br/>'; 
		echo $this->Html->link('Zpět', '/navigation/view/'.$this->Form->data['Navigation']['category'].'/'.$this->Form->data['Navigation']['area'])?>
