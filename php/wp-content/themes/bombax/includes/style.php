<?php
/**
 * The CSS
 *
 * @package itx_themes
 * @version 2.0
 */

header("Content-type: text/css");

itx_css_import('ui/base/jquery.ui.core.css');
itx_css_import('ui/base/jquery.ui.tabs.css');
include CSS_PATH.itx_get_option('layout','style').'.css';
include CSS_PATH.'default.css';

do_action('itx_styles');

function itx_css_import($path){
	echo '@import url('.get_bloginfo('template_url')."/css/$path);";
}
?>