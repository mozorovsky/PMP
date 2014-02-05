<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="cz" />
	<meta name="language" content="cz" />
	<meta name="title" content="Podlahové studio PMP-Renova Zábřeh nabízí dřevěné podlahy, linolea a dveře" />
	<meta name="description" content="Online prodej dřevěných podlah a dveří od podlahového studia PMP-Renova Zábřeh" />
	<meta name="keywords" content="Podlahové, studio, PMP-Renova, Zábřeh, Dřevěné podlahy, linolea, terasy" />
	<meta name="robots" content="index, follow" />
	<title><?php echo $title_for_layout?></title>
	<!--<link rel="shortcut icon" href="">-->
	
	<?php  echo $this->Html->css(array('style', 'datePicker','autocomplete'));
		echo $html->css(array('print'), 'stylesheet', array('media' => 'print'));
		echo $html->css(array('jquery.lightbox-0.5'), 'stylesheet', array('media' => 'screen'));
		echo $this->Html->script(array('jquery-1.7.1.min','jquery.simplyscroll.min.js', 'ajaxfileupload', 'galupload','jquery-ui-1.8.18.custom.min','jquery.slides.min')); 
		echo $scripts_for_layout;
	?>
	<script>
		$(function(){
      $("#slides").slidesjs({
       	 width: 1024,
       	 height: 180,
		 play: {
   		   effect: "slide",
        		// [string] Can be either "slide" or "fade".
      		interval: 3500,
        	// [number] Time spent on each slide in milliseconds.
      		auto: true,
       		 // [boolean] Start playing the slideshow on load.
      		swap: true,
        		// [boolean] show/hide stop and play buttons
      		pauseOnHover: false,
        	// [boolean] pause a playing slideshow on hover
      		restartDelay: 3500
        	// [number] restart delay on inactive slideshow
    }
      });
    });
	</script>


</head>
<body>
<div id="wrapper">
<div id="header">
	<img src="/img/pmp1.gif" alt="PMP" /><div id="logo-top">TEST-TEST-TEST!!!</div>
<h2 id="logo"></h2>		
<ul id="nav-top">
	<ul>
	<li><span class="menu_default"><a href="/" class="menu_default"> Domů </a></span></li>
	<li><span class="menu_default"><a href="/podminky" class="menu_default"> Všeobecné podmínky </a></span></li>
	<li><span class="menu_default"><a href="/kontakt" class="menu_default"> Kontakt </a></span></li>
	<li><span class="menu_default"><a href="/napiste_name" class="menu_default"> Napište nám  </a></span></li>
	<li><span class="menu_default"><a href="/doprava" class="menu_default"> Doprava </a></span></li>
	<li><span class="menu_default"><a href="/users/login" class="menu_default"> Přihlásit se </a></span></li>
	</ul>
</ul> 

<form id="search" method="post" action="/search" accept-charset="utf-8">
	<input class="text" type="text" name="data[Search][searchquery]" value=""/>
	<!--<input class="submit" type="image" src="img/search_submit.gif" value="HLEDEJ" />-->
	<input type="submit" class="submit" value="HLEDEJ" />
</form>

</div> 

<!-- <div id="Hoofd_menu"><div id="navigation">
<ul>
<li  class="menu_default"><a href="http://www.merkparket.nl/pages/floorfriendly.php" class="menu_default">Floorfriendly</a></li>
</li>
</ul></div></div>-->

<div id="banner">
		<div id="slides">
    		<img src="/img/top1r.jpg">
    		<img src="/img/top2r.jpg">

	  </div>	

<!--<div class="head-left"></div><div class="head-right">
              
</div>-->
</div>

<div id="navig_footer">
	<div class="footer_column long">
        	<h1>LAMINÁTOVÉ PODLAHY</h1>
           	<ul>
			<li><a href="/classen" >Classen</a></li>
			<li><a href="/kronopol" >Kronopol</a></li>
			<li><a href="/platinium" >Platinium</a></li>
		</ul> 
	</div>	       
        <div class="footer_column long">
                <h1>DŘEVĚNÉ PODLAHY</h1>
           	<ul>
			<li><a href="/3vrstva_dubova" >3 vrstvá dubová</a></li>
			<li><a href="/masivni_dubova" >masivní dubová</a></li>
		</ul> <br />
                <h1>VINYLOVÉ PODLAHY</h1>
           	<ul>
			<li><a href="/eco_click" >Eco click</a></li>
			<li><a href="/florex_top" >Florex Top</a></li>
		</ul> 
	</div>        
	<div class="footer_column long">
                <h1>KAUČUKOVÉ A PRYŽOVÉ PODLAHY</h1>
           	<ul>
			<li><a href="/norament_nora" >Norament Nora</a></li>
			<li><a href="/noraplan_nora" >Noraplan Nora</a></li>
		</ul> 
	</div>        
	<div class="footer_column long">
                <h1>OSTATNÍ PODLAHY</h1>
           	<ul>
			<li><a href="/linolea" >linolea</a></li>
			<li><a href="/koberce" >koberce</a></li>
		</ul> <br />
                <h1>TERASOVÉ SYSTÉMY</h1>
           	<ul>
			<li><a href="/twinson_o-terrace" >Twinson O-Terr.</a></li>
			<li><a href="/twinson_o-terrpl" >Twinson O-Terr.+</a></li>
		</ul>
	</div>        
	<div class="footer_column long">
                <h1>INTERIÉROVÉ DVEŘE</h1>	
           	<ul>
			<li><a href="" >Akord</a></li>
			<li><a href="" >Bergamo</a></li>
			<li><a href="" >Damier</a></li>
			<li><a href="" >Elegant</a></li>
			<li><a href="" >Harmonie</a></li>
			<li><a href="" >Kuk</a></li>
		</ul> 
	</div>        
	<div class="footer_column long">
                <h1>SAPELI</h1>
           	<ul>
			<li><a href="" >Note</a></li>
			<li><a href="" >Swing</a></li>
			<li><a href="" >Tenga</a></li>
		</ul> 
	</div>        
	<div class="footer_column long">
                <h1>NAŠE VÝROBA</h1>
           	<ul>
			<li><a href="" >izolace</a></li>		
			<li><a href="" >podlahařské práce</a></li>		
			<li><a href="" >stavební práce</a></li>		
			<li><a href="" >bytová jádra</a></li>		
			<li><a href="" >interiorový design</a></li>					
			<li><a href="" >vzorky</a></li>
		</ul>	
	</div>        

</div>

<div id="content-box">
<div id="content-inner">
<div id="col-left_menu">

<div id="cart">
	<h5 class='cart_info'>V košíku máte</h5> 
	<p class='show_cart'><?php echo $bcount;?> ks položek za <?php echo $btotal;?>,- Kč<br/><?php echo $this->Html->link('zobrazit košík','/basket/view');?></p>
</div>


<ul id="subnavigatie">	
	<ul id="nav-sub">
					<?php if (isset($navigations)) {
						foreach ($navigations as $navigation):
							if (isset($name) && $navigation['Navigation']['href'] == '/'.$name || isset($infolink) && $navigation['Navigation']['href'] == '/'.$infolink) {
								echo '<li>'.$this->Html->link($navigation['Navigation']['title'], $navigation['Navigation']['href'], array('class' => 'selected')).'</li>';
							} else {
								echo '<li>'.$this->Html->link($navigation['Navigation']['title'], $navigation['Navigation']['href']).'</li>';	
							}
							
					  	endforeach; }
					if ($session->read('Auth.User.role')=='admin') {?>
						<li>&nbsp;<b>Editace stránek</b></li>
						<li><?php echo $this->Html->link('Nová stránka', '/content/add')?></li>
						<li><?php echo $this->Html->link('Upravit menu', '/navigation/view')?></li>
						<li><?php echo $this->Html->link('Smazat stránku', '/content/delete')?></li>
						<li><?php echo $this->Html->link('Nahrané soubory', '/galleries/view')?></li>
						<li><?php echo $this->Html->link('Objednávky', '/admin/orders')?></li>
						<li><?php echo $this->Html->link('Odhlásit se', '/users/logout')?></li>
					<br /><br />
				<?php } ?>	
				
	</ul>
</ul>

<p><br /></p>
<p><?php echo '&nbsp;&nbsp;&nbsp;'.$this->Html->link($this->Html->image('kronopol.jpg'),'/kronopol', array('escape' => false)).'&nbsp;&nbsp;&nbsp;&nbsp;'.$this->Html->link($this->Html->image('classen.jpg'),'/classen', array('escape' => false))?></p>
<p><br /></p>

</div>

<div id="pagewrap">			
	<?php echo $content_for_layout ?>  
	<br/><br/>
</div>	

</div>
 
 <div id="footer_copy">
            copyright (&copy;) 2013 Podlahové studio PMP-Renova s.r.o. Zábřeh - tel.: + 420 583 412 074, + 420 773 337 710</div>


</div></div>
</body>
</html>