<select name="data[Property][district]" id="FlatDistrict">
<?php if (isset($empty)) {?>
	<option value=""></option>
<?php }
foreach($options as $key => $val) { ?>
<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
<?php } ?>
</select>
