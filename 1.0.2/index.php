<?php
/**
 * @package article_PW
 * @version 1.0
 */
/*
Plugin Name: Part Content Encryption
Plugin URI: https://mailberry.com.cn/part-content-encryption
Description: WP自带的文章或页面加密码，只能是整编文章或页面，此插件可以部分内容加密；写文章或页面时，只需加短代码标签[pw key="密码"]需要加密的内容[/pw]
Author: MailBerry
Version: 1.0
Author URI: https://mailberry.com.cn
*/
function e_encryption_enqueue_style()
{
	wp_enqueue_style('encryption-style',plugins_url('/style.css',__FILE__),array(),'1.0.0','all');
}
add_action('wp_enqueue_scripts','e_encryption_enqueue_style');
function e_encryption($atts, $content=null){
	extract(shortcode_atts(array('key'=>null), $atts));
	if(isset($_POST['e_encryption_key']) && $_POST['e_encryption_key']==$key){
	return '
	<div class="e-encryption">'.$content.'</div>
	';
	}
	else{
	return '
	<form class="e-encryption" action="'.get_permalink().'" method="post" name="e-encryption"><label>输入密码查看加密内容：</label><input type="password" name="e_encryption_key" class="encry-i" maxlength="50"><input type="submit" class="encry-s" value="确定">
	<div class="euc-clear"></div>
	</form>
	';
	}
	}
	
	add_shortcode('pw','e_encryption');