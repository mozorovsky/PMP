<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="description" content="Kurzy alfa">
<meta name="keywords" content="alpha course, kurzy alfa, kurzyalfa">

<title><?php echo $title_for_layout?></title>

<? echo $this->Html->css(array('style', 'datePicker','autocomplete','demo_table_jui'));
	echo $html->css(array('jquery.lightbox-0.5'), 'stylesheet', array('media' => 'screen'));
echo $this->Html->script(array('jquery-1.7.1.min','jquery.simplyscroll.min.js', 'ajaxfileupload', 'galupload','jquery-ui-1.8.18.custom.min')); 
echo $scripts_for_layout;?>

</head>

<body class="page page-id-20 page-template-default">
	
	<div id="global-navigation-main" class="global-navigation">
	<div class='container_12'>
		<ul>
			<li id="menu-item-133" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-133">
				<?php echo $this->Html->link('Alfa', '/')?></li>
			<li id="menu-item-132" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-132">
				<?php echo $this->Html->link('Rodinné kurzy', 'http://www.manzelskevecery.cz')?></li>
		</ul>
		<ul class="account">
			<li id="menu-item-132" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-132">
				<?php echo $this->Html->link('Podpořte nás', '/content/view/support')?></li>
			<li id="menu-item-132" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-132">
								<?php if ($session->read('Auth.User.id')) {
					echo $this->Html->link('Odhlásit se', '/users/logout');	
				} else {
					echo $this->Html->link('Přihlásit se', '/users/login');	
				}?></li>
		</ul>
	</div>
	</div>
	
	<div id="global-navigation-sub" class="global-navigation">
	<div class='container_12'>
		<ul>
			<li id="menu-item-153" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-153">
				<?php echo $this->Html->link('Kurzy Alfa', '/content/view/alfa')?></li>
			<li id="menu-item-154" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-154">
				<?php echo $this->Html->link('Alfa pro mládež', '/content/view/alfa_youth')?></li>
			<li id="menu-item-154" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-154">
				<?php echo $this->Html->link('Alfa v katolické církvi', '/content/view/alfa_catholic')?></li>				
		</ul>		
	</div>
	</div>  

	<div class="container_12 content">
	<?php if (!isset($wide)) {?>
	<div id="container" class="grid_9 article_content">
	<?php }?>
		<?php echo $content_for_layout ?> 	
		<?php if (!isset($wide)) {?>
	</div><!-- #container -->
		<?php }?>
		<?php if (!isset($wide)) {?>	
	<div class="grid_3">
	<div style="height:75px"></div>
	<div class="sidebar">
	<div id="sidebar" role="complementary">
		<ul>
			<aside id="recent-posts-2" class="widget widget_recent_entries">
				
				<?php if ($session->read('Auth.User.role')=='admin') {?>
					<h3 class="widget-title">Administrace</h3><br />		
					<ul>						
						<li><?php echo $this->Html->link('Správa uživatelů', '/admin')?></li>
						<li><?php echo $this->Html->link('Šablony', '/templates')?></li>
						<li><?php echo $this->Html->link('Přehledová tabulka', '/admin/table')?></li>
						<li><?php echo $this->Html->link('Seminář', '/sforms/results')?></li>
					</ul><br /><br />
				<?php } ?>	

				<?php if ($session->read('Auth.User.role')=='admin') {?>
					<h3 class="widget-title">Editace stránek</h3><br />		
					<ul>						
						<li><?php echo $this->Html->link('Nová stránka', '/content/add')?></li>
						<li><?php echo $this->Html->link('Upravit menu', '/navigation/view')?></li>
						<li><?php echo $this->Html->link('Smazat stránku', '/content/delete')?></li>
						<li><?php echo $this->Html->link('Nahrané soubory', '/galleries/view')?></li>
					</ul><br /><br />
				<?php } ?>	
				
				<?php if ($session->read('Auth.User.role')=='admin' || $session->read('Auth.User.role')=='user') {?>
					<h3 class="widget-title">Uživatel <?php echo $session->read('Auth.User.username')?></h3><br />		
					<ul>						
						<li><?php echo $this->Html->link('Údaje uživatele', '/users/edit')?></li>
						<li><?php echo $this->Html->link('Údaje vedoucího kurzu', '/users/courseleader')?></li>
						<li><?php echo $this->Html->link('Údaje vedoucího společentsví', '/users/communityleader')?></li>
						<li><?php echo $this->Html->link('Údaje kurzu Alfa', '/users/course')?></li>
					</ul><br /><br />
				<?php } ?>	


				<!--<h3 class="widget-title">Navigace</h3><br />-->		
				<ul>
					<?php if (isset($navigations)) {
						$i = 0;
						foreach ($navigations as $navigation):
							if ($i==0) {
						echo '<li><h3>'.$this->Html->link($navigation['Navigation']['title'], $navigation['Navigation']['href']).'</li></h3>';
							} else { 
						echo '<li>'.$this->Html->link($navigation['Navigation']['title'], $navigation['Navigation']['href']).'</li>';
							}
							//echo $this->Html->link($navigation['Navigation']['title'], $navigation['Navigation']['href']).'</li>';
								$i++;
					  	endforeach; }?>

				</ul>
			</aside>		
		</ul>	
	</div>
	</div>
	</div>
	<div class="clear"></div>
		<?php } ?>

	</div> <!-- .container_12 -->

	<div class="footer">
	<div class="container_12">
	<div class="grid_12" style="height:25px">
	</div>
	<div class="grid_12" style="height:25px">
	</div>
	<div class="clear"></div>
	<div class="grid_4">
		<aside id="nav_menu-2" class="widget widget_nav_menu">
			<div class="menu-footer-menu-1-container">
			<ul id="menu-footer-menu-1" class="menu">
				<li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100">
					<?php echo $this->Html->link('Naše poslání', '/content/view/rada')?></li>
			</ul>
			</div>
		</aside>			
	</div>
	<div class="grid_4">
		<aside id="nav_menu-3" class="widget widget_nav_menu">
			<div class="menu-footer-menu-2-container">
			<ul id="menu-footer-menu-2" class="menu">
				<li id="menu-item-101" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-101">
					<?php echo $this->Html->link('Dary na Alfu', '/content/view/support')?></li>
				<li id="menu-item-149" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-149">
					<?php echo $this->Html->link('Registrace', '/content/view/registrace')?></li>
				<li id="menu-item-246" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-246">
					<?php echo $this->Html->link('Novinky o dění kolem kurzů Alfa, materiály, akce, svědectví a mnoho dalšího.', 
					'mailto:info@kurzyalfa.cz?subject=Zadost o zasilani novinek')?></li>
			</ul>
			</div>
		</aside>			
	</div>
	<div class="grid_4">
		<aside id="linkcat-2" class="widget widget_links">
			<ul class='xoxo blogroll'>
				<li><?php echo $this->Html->link('Ochrana osobních údajů', '/content/view/privacy')?></li>
			</ul>
		</aside>
	</div>
	
	<div class="clear"></div>
	<div class="grid_12" style="height:50px">
	</div>
	<div class="clear"></div>
	
	<div class="grid_12">
		<aside id="text-2" class="widget widget_text">			
			<div class="textwidget"><strong>© 2012 Alpha International  a  Česká kancelář kurzů Alfa</strong><br />
			KMS – kurzy Alfa, Primátorská 41, 180 00 Praha 8   Tel: +420 724 435 303</div>
		</aside><br />
	</div>

	</div>
	</div>	

</body>
</html>
