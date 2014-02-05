<?php echo $this->Javascript->codeBlock(
			"function fileBrowserCallBack(field_name, url, type, win) {
				browserField = field_name;
				browserWin = win;
				window.open('/galleries/view', 'browserWindow', 'modal,width=600,height=400,scrollbars=yes,left=350,top=250');
			}
			") ;
	echo $this->TinyMCE->init(array('mode'=>'textareas','theme'=>'advanced','convert_urls'=>false, 
	'theme_advanced_buttons1' => 'bold,italic,underline,separator,forecolor,backcolor,separator,undo,redo,separator,removeformat,charmap,sub,sup,code,separator,image,link', 
	'theme_advanced_buttons2' => 'hr,numlist,separator,justifyleft,justifycenter,justifyright,justifyfulloutdent,outdent,indent,separator,formatselect,table', 
	'theme_advanced_buttons3' => '', 'plugins' => 'advimage,advlink,table', 'language' => 'cs',
	'theme_advanced_toolbar_location' => 'top', 'theme_advanced_toolbar_align' => 'left', 'file_browser_callback' => 'fileBrowserCallBack',
	'extended_valid_elements' => 'img[!src|border:0|alt|title|width|height|style]a[name|href|target|title|onclick]'));?>
<h2>Editace stránky</h2><br/>
<?php 	echo $this->Form->create('Content', array('url' =>  '/content/edit/'.$this->data['Content']['name']));
	  	echo $this->Form->input('title', array( 'label' => 'Nadpis stránky: ')).'<br/>';
		echo $this->Form->hidden('name');
		echo $this->Form->hidden('id');
//		echo $this->Form->hidden('category');
		echo $this->Form->input('type', array( 'label' => 'Typ: ', 'after'	=> '<div class="clear"></div>', 'empty' => '',
			'options' => array('info'=>'Informační stránka', 'product'=>'Popis produktu'))); 
		echo $this->Form->input('category', array( 'label' => 'Kategorie: ', 'after'	=> '<div class="clear"></div>', 'onchange' => 'this.form.submit();', 'empty' => '',
			'options' => array('LAMINÁTOVÉ PODLAHY'=>'LAMINÁTOVÉ PODLAHY', 'DŘEVĚNÉ PODLAHY'=>'DŘEVĚNÉ PODLAHY','VINYLOVÉ PODLAHY'=>'VINYLOVÉ PODLAHY'))); 
		echo $this->Form->input('area', array( 'label' => 'Oblast: ', 'after'	=> '<div class="clear"></div>', 
			'options' => $area)); 
		echo $this->Form->input('price', array( 'label' => 'Cena: ', 'after'	=> '<div class="clear"></div>')); 
		echo $this->Form->input('ratio', array( 'label' => 'Balení: ', 'after'	=> '<div class="clear"></div>')); 			
		echo $this->Form->input('infolink', array( 'label' => 'Zobrazit v: ', 'after'	=> '<div class="clear"></div>', 'empty' => '', 'options' => $infolinks)); 
	  	echo $this->Form->textarea('content', array('cols' => '100', 'rows' => '20', 'class' => 'form-textarea', 'id' => 'act-edit')).'<br/>';			?>
<br />

<label>Nahrát soubor:</label>
<div class="form-item" id="upload-wrapper">	</div>	
<input type="file" name="data[Picture][file]" accept="png,gif,jpg,jpeg" class="form-file" id="file-upload" size="22"/>
<div class="clear"></div>
<?php echo $this-> Form ->button ('Nahrávání souborů', 
  		array(	'id' => 'buttonUpload', 'class' => 'form-submit', 'onclick' => 'return ajaxFileUpload(\'/galleries/add\',\'file-upload\',\'upload-wrapper\',\'0\');'));
		echo $this->Html->image('status-active.gif', array('id' => 'picloading', 'style' => 'display:none;'));?>
<div class="clear"></div>
<?php	echo $this->Form->button('Preview', array('name' => 'preview'));
		echo $this->Form->button('Uložit obsah', array('name' => 'save')); ?>
		<br/>
		<div class="page">
			<div class="home-user-content"> 
  		<?php if (isset($preview)) { echo $preview; } else {echo $this->data['Content']['content'];}?>
			</div>
		</div>	
