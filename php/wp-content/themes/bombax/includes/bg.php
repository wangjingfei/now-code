<?php
/**
 * Functions to handle the custom background
 *
 * @package itx_themes
 * @version 2.1
 */

function itx_bg(){}
if (function_exists('add_custom_background')) add_custom_background('itx_bg');

function itx_bg_styles(){
	if (function_exists('add_custom_background')){
		$background = get_background_image();
		$color = get_background_color();
	}
	extract(itx_get_option('bg'));

	$style = $color ? "background-color: #$color;" : "background-color:$bgcolor;";

	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', 'left' );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', 'scroll' );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	} else {
		$style.="background-image:url($image); background-attachment:$attachment;background-repeat: $repeat; background-position:$h_align $v_align ;";
	}
    $resize=$resize*0.625;
    echo "body{{$style}font-size: $resize%;}";
}
add_action('itx_styles','itx_bg_styles');
?>