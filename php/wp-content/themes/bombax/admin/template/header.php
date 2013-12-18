<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
extract(itx_get_option('header'));?>

<div id="itx-header">
<h3>Custom Header</h3>

<p><b>Preview</b>: <small>(might not accurate)</small></p>
<p>The dotted line indicates the scope. (defined in: header options item number 6).</p>
<div class="outerwrap">
<?php itx_header()?>
</div>
<div class="form-table">
<h4>1. Header Background:</h4>
<p>You can set the header background using <a href="themes.php?page=custom-header">WordPress Custom Header</a>
<?php
if (function_exists('register_default_headers')){
	echo 'or using an image already uploaded somewhere:';
}else{
	echo 'or you can use predefined header images:<br>';
	$headbg=array();
	foreach (itx_setting('head_bg') as $k=>$v){
		$headbg[$k]=$v['description'];
	}
	if (is_array($headbg)) itx_form_radios($headbg+array(''=>'or Custom Image specified below:'), 'header[head_bg]', $head_bg);
}
?>
</p>
<div class="radiopad">
<input type="text" name="<?php echo get_stylesheet();?>_header[image]" value="<?php echo $image;?>" size="70" /><br />
Enter the image's url of the header background (Don't forget the http://). Use it if only you have been
uploaded the image somewhere, otherwise use <a href="themes.php?page=custom-header">WordPress Custom Header</a>.

</div>

<p>FYI: If you're using <a href="themes.php?page=custom-header">WordPress Custom Header</a>
you have to crop the header image in certain dimension. The x value is the same as
wrapper width that have been set in <a href="#itx-layout">Layout Options</a>
(equals to max width in fluid layout or equals to wrapper width in fixed layout).
The y value is default to 200 px. You can change the y value here:
<input type="text" name="<?php echo get_stylesheet();?>_header[bg_height]" value="<?php echo $bg_height;?>" size="4" >px
</p>
<h4>2. Show in header:</h4>
    <?php
    itx_form_radios(array('Text Header (clickable text)','Image Header (clickable logo) :'), 'header[head_type]', $head_type);
    ?>
<div class="radiopad">
	<input type="text" name="<?php echo get_stylesheet();?>_header[logo]" value="<?php echo $logo;?>" size="70" /><br />
	Enter the logo url. Don't forget the http://
</div>

<h4>3. Repeat The Background Image</h4>
    <?php
    itx_form_radios(array('no-repeat'=>'none','repeat-x'=>'Repeat Horizontally','repeat-y'=>'Repeat Vertically','repeat'=>'Repeat Horizontally and Vertically'), 'header[repeat]', $repeat);
    ?>

<h4>4. Background Image Horizontal Alignment</h4>
if option 3A selected<br />
    <?php
        itx_form_radios(array('left'=>'Left','center'=>'Center','right'=>'Right'), 'header[h_align]', $h_align);
    ?>

<h4>5. Background Image Vertical Alignment</h4>
if option 3A selected<br />
    <?php
        itx_form_radios(array('top'=>'Top','center'=>'Center','bottom'=>'Bottom'), 'header[v_align]', $v_align);
    ?>

<h4>6. Background Image Scope</h4>
    <?php
    $wrapper=itx_get_option('layout');
    if ($wrapper['wrapping']=='fixed') $wrapping=$wrapper['wrap'].'px';
    else $wrapping='98% + margin';
    itx_form_radios(array('As width as wrapper width ('.$wrapping.')','Full Width'), 'header[scope]', $scope);
    ?>

<h4>7. Text/logo alignment</h4>
    <?php
    itx_form_radios(array('left'=>'Left','center'=>'Center','right'=>'Right'), 'header[text_align]', $text_align);
    ?>

<h4>Colors and Sizes</h4>

<table>
	<tr>
		<td>Header height</td>
		<td><input type="text" name="<?php echo get_stylesheet();?>_header[height]" value="<?php echo $height;?>" size="9" > size in pt,px,em,etc. <br> Set it empty to make the size follows the normal flow.</td>
	</tr>
	<tr>
		<td>Blog Title font size</td>
		<td><input type="text" name="<?php echo get_stylesheet();?>_header[font_size]" value="<?php echo $font_size;?>" size="9" > size in pt,px,em,etc. </td>
	</tr>
	<tr>
		<td>Tagline font size</td>
		<td><input type="text" name="<?php echo get_stylesheet();?>_header[span_font_size]" value="<?php echo $span_font_size;?>" size="9" ></td>
	</tr>
	<tr>
		<td>Header background color</td>
		<td><input type="text" name="<?php echo get_stylesheet();?>_header[bgcolor]" value="<?php echo $bgcolor;?>" size="9" > <br> tip: use <em>transparent</em> to make it same as body background</td>
	</tr>
	<tr>
		<td>Blog Title color</td>
		<td><input type="text" name="<?php echo get_stylesheet();?>_header[color]" value="<?php echo $color;?>" size="9" > <br> tip: you may use <em>black</em> instead of <em>#000000</em></td>
	</tr>
	<tr>
		<td>Blog Title hover color</td>
		<td><input type="text" name="<?php echo get_stylesheet();?>_header[hover_color]" value="<?php echo $hover_color;?>" size="9" ></td>
	</tr>
	<tr>
		<td>Tagline color</td>
		<td><input type="text" name="<?php echo get_stylesheet();?>_header[span_color]" value="<?php echo $span_color;?>" size="9" ></td>
	</tr>
</table>
</div>
<div class="clear"></div>
<?php do_action('itx_admin_header');?>
<button type="submit" name="<?php echo get_stylesheet();?>_reset" class="button-secondary"  value="header"  onclick="if (!confirm('Do you want to reset Header Options to Default?')) return false;">Reset to default Header Options</button>
</div>