<h2>Přidat navigaci</h2>

<?php if (isset($this->Form->data['Navigation']['id'])) {
	echo $this->Form->create('Navigation', array('url' =>  '/navigation/edit/'.$this->Form->data['Navigation']['id']));		
} else {
	echo $this->Form->create('Navigation', array('url' =>  '/navigation/add'));	
}
  	echo $this->Form->input('title', array('label' => 'Nadpis:', 'after' => '<div class="clear"></div>'));
	echo $this->Form->hidden('block');
	echo $this->Form->hidden('category');
	echo $this->Form->hidden('area');
	echo $this->Form->hidden('delta');
	echo $this->Form->input('contents', array( 'label' => 'existující stránky: ', 'options' => $contents, 
		'onClick' => 'document.getElementById("NavigationHref").value="/" + this.value', 	'empty' => '', 'after'	=> '<div class="clear"></div>'));	
	echo $this->Form->input('href', array('label' => 'odkaz: ', 'value' => '/')).'<br/>';
?>
<br />
<?php	echo $this->Form->end('Uložit').'<br/>'; 
		echo $this->Html->link('Zpět', '/navigation/view/'.$this->Form->data['Navigation']['category'].'/'.$this->Form->data['Navigation']['area'])?>
