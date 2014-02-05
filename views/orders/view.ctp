<h1>Objednávka</h1>
<?php 	echo $this->Session->flash(); ?>
<div class="page">
<div class="home-user-content"> 
<div class="itembox">
	<div id="order_fa" style="margin-left: 20px; width: 200px; float: left;">
		<p><br/><b>Fakturační adresa</b></p><p>
		<?php echo $order['Contact']['firma'].'<br/>';
			echo $order['Contact']['titul'].' '.$order['Contact']['jmeno'].' '.$order['Contact']['prijmeni'].'<br/>';
			echo $order['Contact']['ulice'].'<br/>';
			echo  $order['Contact']['psc'].' '.$order['Contact']['mesto'].'<br/>';
		?></p><p><br/></p><p><br/></p>
	</div>
<?php if ($order['Contact']['usealt'] == '1') {?>
	<div style="margin-left: 200px; display: inline-block;">
		<p><br/><b>Dodací adresa</b></p><p>
		<?php echo $order['Contact']['a_firma'].'<br/>';
			echo $order['Contact']['a_titul'].' '.$order['Contact']['a_jmeno'].' '.$order['Contact']['a_prijmeni'].'<br/>';
			echo $order['Contact']['a_ulice'].'<br/>';
			echo  $order['Contact']['a_psc'].' '.$order['Contact']['a_mesto'].'<br/>';
		?></p><p><br/></p><p><br/></p>
	</div>
<?php } else {?>	
	<div style="margin-left: 200px; display: inline-block;">
		<p><br/><b>Dodací adresa</b></p><p>
		<?php echo $order['Contact']['firma'].'<br/>';
			echo $order['Contact']['titul'].' '.$order['Contact']['jmeno'].' '.$order['Contact']['prijmeni'].'<br/>';
			echo $order['Contact']['ulice'].'<br/>';
			echo  $order['Contact']['psc'].' '.$order['Contact']['mesto'].'<br/>';
		?></p><p><br/></p><p><br/></p>
	</div>

<?php }?>
	<div id="order_fa" style="margin-left: 20px; width: 200px; float: left;">
		<p><b>Kontaktní údaje:</b></p>
		<p>Telefon: <?php echo $order['Contact']['telefon']?></p>
		<p>Mobil: <?php echo $order['Contact']['mobil']?></p>		
		<p>Email: <?php echo $order['Contact']['email']?></p>
	</div>		
	<div style="margin-left: 200px; display: inline-block;">
		<p>IČO: <?php echo $order['Contact']['ico']?></p>
		<p>DIČ: <?php echo $order['Contact']['dic']?></p>
		<p><br/></p>
	</div>
	<p><br/></p><p><br/></p>
	<div id="order_fa" style="margin-left: 20px; width: 200px; float: left;">
		<p>Platba: <?php if ($order['Order']['paycondition'] == 'D') {
								echo 'dobírka';
							} else {
								echo 'převod na účet';
							}?></p>
		<p>Doprava: <?php if ($order['Order']['transport'] == 'O') {
								echo 'osobně na prodejně';
							} else {
								echo 'dopravce';
							}?></p>		

	</div>		
	<p><br/></p><p><br/></p>
	<table class="basket" style="font-size:13px;margin-left: 20px;" cellspacing="10" cellpadding="5">
		<tr>
			<th>Název položky</th>
			<th>Cena za jedn.</th>
			<th>Počet jedn. / balení</th>
			<th>Celkem</th>
		</tr>
		<tr><td colspan="4"><hr /></td></tr>
	<?php 	
		$itemstotal = 0;
		foreach ($order['Item'] as $item) {
			$countotal = $item['count'] * $item['ratio'];
			$itemstotal += $item['itemtotal'];
			echo  '<tr><td>'.$item['title'].'</td><td align="right">'.$item['price'].'</td><td align="right">'.$countotal.' / '.$item['count'].'</td><td align="right">'.$item['itemtotal'].'</td></tr>';
		}  
			if ($order['Order']['transport'] == 'P' && $order['Order']['transportprice'] > 0) {
				echo '<tr><td>Doprava</td><td align="right"></td><td align="right"></td><td align="right">'.$order['Order']['transportprice'].'</td></tr>';
				$itemstotal += $order['Order']['transportprice'];
			}
			echo '<tr><td colspan="4"><hr /></td></tr>';

			echo '<tr><th></th><th colspan="2">Celková cena s DPH</th><th>'.$itemstotal.',- Kč</th></tr>';?>
	</table>
</div>	
<p><br /></p>
<?php 	echo $this->Form->create(NULL, array('url' => '/orders/confirm'));
		echo '<p>Souhlasím s obchodními podmínkami: '.$this->Form->checkbox('accept').'<div class="clear"></div></p>';
		echo $this->Form->end('Odeslat objednávku');?>								
</div>
</div>