<div id="user-menu"><div id="block-block-12" class="clear-block block block-block">

  <h2>Informace pro uživatele</h2>

  <div class="content">
  	<?php if (isset($editinfo)) {
		echo $editinfo;
	} elseif (isset($userinfo)) {
			echo $userinfo['Block']['content'];
		} ?>
</div>
</div>
<div id="block-block-1" class="clear-block block block-block">


  <div class="content"><h2><?php echo __('Welcome')?>&nbsp;<?php echo $session->read('Auth.User.username')?></h2>

Můj účet<ul>
<li><?php echo $this->Html->link(__('My properties', TRUE), '/' . $this->Session->read('Config.language') . '/properties/myproperties')?></li>
<li><?php echo $this->Html->link('Prodloužit nemovitosti', '/' . $this->Session->read('Config.language') . '/properties/toextend')?></li>
<!--	<li><a href="/cs/user/121/advertisement">Moje reklama</a></li>
	<li><a href="/cs/support/reklamni-bannery" class="red">Objednat reklamní bannery</a></li>-->
<li><?php echo $this->Html->link(__('My settings', TRUE), '/' . $this->Session->read('Config.language') . '/users/view')?></li>
<?php if ($session->read('Auth.User.role')!='user') {?>
	<li><?php echo $this->Html->link(__('My profile', TRUE), '/' . $this->Session->read('Config.language') . '/profiles/view/'. $session->read('Auth.User.id'))?></li>	
	<li><?php echo $this->Html->link(__('Request for change of entry in profile', TRUE), '/' . $this->Session->read('Config.language') . '/profiles/changemail')?></li>
	<li><?php echo $this->Html->link('Soukromá inzerce v mém okrese', '/' . $this->Session->read('Config.language') . '/properties/showpriv')?></li>
<?php } ?>	
<li><?php echo $this->Html->link(__('Contracts and templates', TRUE), '/' . $this->Session->read('Config.language') . '/pages/smlouvy_vzory')?></li>
<li><?php echo $this->Html->link(__('Log out', TRUE), '/' . $this->Session->read('Config.language') . '/users/logout', array('class' => 'red'))?></li>
<li><?php echo $this->Html->link(__('New properties in the system', TRUE), '/' . $this->Session->read('Config.language') . '/properties/last72')?></li>
<li><?php echo $html->link(__('BigReality logotypes',TRUE), '/files/BigReality-logo.zip')?></li>
</ul>

<?php if ($session->read('Auth.User.active')) {
echo __('Add property')?>
	<ul>
		<li><?php echo $this->Html->link(__('Add flat', TRUE), '/' . $this->Session->read('Config.language') . '/properties/add/flat')?></li>
		<li><?php echo $this->Html->link(__('Add house', TRUE), '/' . $this->Session->read('Config.language') . '/properties/add/house')?></li>
		<li><?php echo $this->Html->link(__('Add land', TRUE), '/' . $this->Session->read('Config.language') . '/properties/add/land')?></li>
		<li><?php echo $this->Html->link(__('Add commercial', TRUE), '/' . $this->Session->read('Config.language') . '/properties/add/commercial')?></li>
		<li><?php echo $this->Html->link(__('Add recreational', TRUE), '/' . $this->Session->read('Config.language') . '/properties/add/recreational')?></li>
	</ul>
<?php } 
	if ($session->read('Auth.User.role')=='admin') {?>
System menu<ul>
		<li><?php echo $this->Html->link(__('User list', TRUE), '/' . $this->Session->read('Config.language') . '/users/index')?></li>
		<li><?php echo $this->Html->link(__('Users content', TRUE), '/' . $this->Session->read('Config.language') . '/admin/userscontent')?></li>
		<li><?php echo $this->Html->link('Schválit soukromé inzeráty', '/' . $this->Session->read('Config.language') . '/properties/toapprove')?></li>
		<li><?php echo $this->Html->link(__('Last 24 hours', TRUE), '/' . $this->Session->read('Config.language') . '/properties/last24admin')?></li>
		<li><?php echo $this->Html->link(__('Last 72 hours', TRUE), '/' . $this->Session->read('Config.language') . '/properties/last72admin')?></li>
<!--<li><a href="/cs/xml-scan" class="red">XML scanner</a></li>-
<li><a href="/cs/archive">Archive</a></li>-->
		<li><?php echo $this->Html->link('Změnit info v žádosti uživatelům', '/' . $this->Session->read('Config.language') . '/admin/edituserinfo')?></li>
<!--<li><a href="/cs/node/49/edit">Změnit info na titulní straně</a></li>-->
		<li><?php echo $this->Html->link('Přidat aktualitu', '/' . $this->Session->read('Config.language') . '/actualities/add', array('class' => 'red'))?></li>
<!--<li><a href="/cs/ratings">Hodnocení</a></li>-->
		<li><?php echo $this->Html->link('Poslední importy', '/' . $this->Session->read('Config.language') . '/properties/imported')?></li>
		<li><?php echo $this->Html->link('Prodáno', '/' . $this->Session->read('Config.language') . '/admin/sold')?></li>
		<li><?php echo $this->Html->link('Upravit podmínky pro makléře', '/' . $this->Session->read('Config.language') . '/content/edit/12')?></li>
		<li><?php echo $this->Html->link('Upravit podmínky pro uživatele', '/' . $this->Session->read('Config.language') . '/content/edit/13')?></li>
<li><a href="/cs/node/add/emailmessage">Hromadná zpráva uživatelům</a></li>
</ul>	
  <h2><?php echo __('Who\'s online')?></h2>
  <div id="onlineusers"><?php echo __('Online users: ', true).$brokeronline['0']['count'].' | '.__('Online guests: ', true).$guestonline['0']['count'] ?></div>
<?php }?>
</div>
</div>
</div>					
					  						  
<div id="bannery"></div>
						<!-- /bannery --> 
<div id ="lojza-sw"><a href="http://www.nemovitosti.cz/realitni-program-software"><img src="http://www.nemovitosti.cz/images/lojza.jpg" alt="Realitní software LOJZA" title="Realitní software LOJZA" /></a>
 <br />
 <a href="http://www.nemovitosti.cz/realitni-program-software">Realitní software LOJZA</a>
 </div>