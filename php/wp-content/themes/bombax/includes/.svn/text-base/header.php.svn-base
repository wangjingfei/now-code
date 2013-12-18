<?php
/**
 * Functions to handle the custom header
 *
 * @package itx_themes
 * @version 2.1
 */
define('HEADER_IMAGE', itx_header_bg_default());
define('HEADER_IMAGE_WIDTH', itx_header_bg_width());
define('HEADER_IMAGE_HEIGHT', itx_get_option('header','bg_height'));
define('NO_HEADER_TEXT', true );
define('HEADER_TEXTCOLOR', '');
add_custom_image_header('','');
if (function_exists('register_default_headers')){
	register_default_headers(itx_setting('head_bg'));
}

function itx_header_bg_default(){
	$headbg=$headbg=itx_setting('head_bg',itx_default_option('header','head_bg'));
	return $headbg['url'];
}

function itx_header_bg_width(){
	extract(itx_get_option('layout'));
	if ($wrapping=='fixed') return $wrap;
	else return $max_width;
}

function itx_header(){
    extract(itx_get_option('header'));
    if ($head_type==1){
        echo'
        <div id="headerwrap">';
        if (!$scope) echo '<div id="header" class="wrap">';
            echo '<div class="clear"></div>
				<a href="'.get_option('home').'/" title="'.htmlspecialchars(get_bloginfo('name')).'">
                <img src="'.$logo.'" alt="'.htmlspecialchars(get_bloginfo('name')).'" title="'.htmlspecialchars(get_bloginfo('name')).'" />
            </a>';
        if (!$scope) echo '</div>';
        echo '</div>';
    }else{
        echo'
        <div id="headerwrap"><div class="clear"></div>
        <div id="header" class="wrap">';
		if ( is_home() || is_front_page() ){
			echo '<h1 class="header"><a href="'.get_option('home').'">'.get_bloginfo('name').'</a></h1>';
		} else {
			echo '<div class="header"><a href="'.get_option('home').'">'.get_bloginfo('name').'</a></div>';
		}
        echo'<span class="tagline">'.get_bloginfo('description').'</span>
        </div>
        </div>';
    }
}

function itx_header_styles(){
	$halfwrap=$fullwrap='';
    extract(itx_get_option('header'));

	$height=empty($height)?'':" height:$height;";
	if (function_exists('register_default_headers')){
		$bg=(empty($image))?get_header_image():$image;
	} else {
		if (!get_theme_mod('header_image')){
			$headbg=itx_setting('head_bg',$head_bg);
			$bg=sprintf($headbg['url'],get_template_directory_uri());
		}
		if (empty($bg)) $bg=$image;
	}
	$bg=(empty($bg))?'':"url($bg)";
	$img="background:$bgcolor $bg $repeat $h_align $v_align;$height";
	if ($scope==1) $fullwrap=$img;
	else $halfwrap=$img;
	if (itx_get_option('layout','wrapping')=='fixed') $maxw=itx_get_option('layout','wrap').'px';
    else $maxw='98%';
    echo "
#headerwrap{ $fullwrap text-align: $text_align;}
#header{ $halfwrap }
#header .header {font-size: {$font_size};}
#header .header a {color: $color;text-decoration: none;}
#header .header a:hover {color: $hover_color;}
#header img{max-width:$maxw;}
#header .tagline {font-size: {$span_font_size};color: $span_color;}";
}
add_action('itx_styles','itx_header_styles');
?>