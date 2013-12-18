<?php
/*
Plugin Name: Baidu Tracker Generator
Plugin URI: http://www.webucd.com/wp-baidu-tracker/
Description: This pulgin generates Baidu Tracker for WordPress Blog. 此插件将百度统计代码安装到wordpress,简单容易上手，可设置开启和关闭统计,管理页面跟踪. 
Version: 1.0.0
Author: webbeast
Author URI: http://www.webucd.com
*/

/*  Copyright 2010 webbeast  (email : admin _at_ webucd.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/**
 * 常量
 */
define ( BATDU_TRACKER_VERSION_PLUGIN, '1.0.0', true );

/**
 * 设置配置项
 * @param unknown_type $option_name
 * @param unknown_type $option_value
 */
function BaiduTracker_set_option($option_name, $option_value) {
	$BaiduTracker_options = get_option ( 'BaiduTracker_options' );
	$BaiduTracker_options [$option_name] = $option_value;
	update_option ( 'BaiduTracker_options', $BaiduTracker_options );
}

/**
 * 获取配置项
 * @param unknown_type $option_name
 * @param unknown_type $option_value
 */
function BaiduTracker_get_option($option_name) {
	$BaiduTracker_options = get_option ( 'BaiduTracker_options' );
	if (! $BaiduTracker_options || ! array_key_exists ( $option_name, $BaiduTracker_options )) {
		$BaiduTracker_default_options = array ();
		$BaiduTracker_default_options ["site_code"] = "";
		$BaiduTracker_default_options ['enable_tracker'] = true;
		$BaiduTracker_default_options ['track_adm_pages'] = true;
		add_option ( 'BaiduTracker_options', $BaiduTracker_default_options, 'Settings for baidu tracker plugin' );
		$result = $BaiduTracker_default_options [$option_name];
	} else {
		$result = $BaiduTracker_options [$option_name];
	}
	return $result;
}

/**
 * 底部生成HTML
 */
function BaiduTracker_footer() {
	if(BaiduTracker_get_option ( 'enable_tracker' )) {
		$html = '<!-- tracker added by 百度统计安装插件  v'.BATDU_TRACKER_VERSION_PLUGIN.': http://www.webucd.com/wp-baidu-tracker/ -->';
		$html .= "\r\n" . stripslashes(BaiduTracker_get_option ( 'site_code' )). "\r\n";
		$html .= "<!-- end tracker -->\r\n";
		echo $html;
	}
}


/**
 * 输出提示信息
 * @param {String} $msg 提示信息
 */
function BaiduTracker_Tip($msg) {
	return '<div class="updated"><p><strong>' . $msg . '</strong></p></div>';
}

/**
 * 输出错误提示信息
 * @param {String} $msg 提示信息
 */
function BaiduTracker_error($msg) {
	return '<div class="error settings-error"><p><strong>' . $msg . '</strong></p></div>';
}


/**
 * 输出设置页HTMl
 * @param {Array} $options 配置项信息
 */
function BaiduTracker_admin_html($options) {
	$enable_tracker = $options['enable_tracker'] ? ' checked="true"' : '';
	$track_adm_pages = $options['track_adm_pages'] ? ' checked="true"' : '';
	echo '<div class=wrap>';
	echo '<form method="post">';
	echo '<h2>设置</h2>';
	echo '<fieldset class="options" name="general"><legend>请复制统计代码粘贴到下面输入框中：</legend>';
	echo '<p></p>';
	echo '<textarea rows="5" class="large-text code" id="site_code"	name="site_code">'. stripslashes($options['site_code']).'</textarea>';
	echo '<input type="checkbox" value="true" id="enable_tracker" name="enable_tracker"'. $enable_tracker .'>&nbsp;开启统计';
	echo '<p><input type="checkbox" value="true" id="track_adm_pages" name="track_adm_pages"'. $track_adm_pages .'>';
	echo '&nbsp;跟踪管理页面</p>';
	echo '<p class="submit"><input type="submit" value="保存设置" class="button-primary" name="Submit"></p>';
	echo '</fieldset>';
	echo '</form>';
	echo '</div>';
}

/**
 * 配置项设置
 */
function BaiduTracker_options() {
	$code = trim($_POST ['site_code']);
	$submit = trim($_POST ['Submit']);
	if ($code && eregi("<script[^>]*>([^<]*)_bdhmProtocol([^<]*)hm.baidu.com/h.js([^<]*)</script>",$code)) {
		BaiduTracker_set_option ( 'site_code', $code );
		echo BaiduTracker_Tip ( "设置成功！" );
	} elseif ($submit) {
		echo BaiduTracker_error ( "统计代码格式不正确，请重新输入!" );
	}
	if (isset ( $_POST ['track_adm_pages'] )) {
		BaiduTracker_set_option ( 'track_adm_pages', true );
	} else {
		BaiduTracker_set_option ( 'track_adm_pages', false );		
	}
	if (isset ( $_POST ['enable_tracker'] )) {
		BaiduTracker_set_option ( 'enable_tracker', true );
	} else {
		BaiduTracker_set_option ( 'enable_tracker', false );		
	}
	BaiduTracker_admin_html(get_option ( 'BaiduTracker_options' ));
	if (BaiduTracker_get_option ( 'track_adm_pages' )) {
		add_action ( 'admin_footer', 'BaiduTracker_footer' );
	} else {
		remove_action ( 'admin_footer', 'BaiduTracker_footer' );
	}
}

/**
 * 管理菜单
 */
function BaiduTracker_admin() {
	if (function_exists ( 'add_options_page' )) {
		add_options_page ( '百度统计代码安装卸载', '百度统计功能', 8, basename ( __FILE__ ), 'BaiduTracker_options' );
	}
}

/**
 * 事件初始化
 */
add_action ( 'admin_menu', 'BaiduTracker_admin' );
if (BaiduTracker_get_option ( 'enable_tracker' )) {
	add_action ( 'wp_footer', 'BaiduTracker_footer' );
}
?>