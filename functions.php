<?php //子テーマ用関数
if ( !defined( 'ABSPATH' ) ) exit;

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下に子テーマ用の関数を書く
$g_domain_name = $_SERVER["SERVER_NAME"];
$g_is_localhost = $g_domain_name == 'localhost';

if ( $g_is_localhost ) {
	$g_analy_g_acount = 'UA-4079996-8';
	$g_domain_name = 'komish.com';
	$g_category_nav = false;
	$g_ad_enabled = false;
	$g_is_localhost = false;
} else {
	if ( $g_domain_name === 'komish.com' ) {
		$g_analy_g_acount = 'UA-4079996-8';
		$g_category_nav = false;
		$g_ad_enabled = true;
	} else if ( $g_domain_name === 'plus.komish.com' ) {
		$g_analy_g_acount = 'UA-4079996-23';
		$g_category_nav = true;
		$g_ad_enabled = false;
	}
}

// for debug
//$g_ad_enabled = true;
//$g_category_nav = true;

$g_noindex_terms = [193, 315, 216, 288, 298, 307, 385];

//noindex条件を追加する
add_filter('is_noindex_page', function ($is_noindex){
	global $post, $g_noindex_terms;

	
	return $is_noindex || (is_single() && in_category($g_noindex_terms));
//  return $is_noindex || is_category(193) || is_category(315) || is_category(216) ||
//  	is_tag(288) || is_tag(298) || is_tag(307) || is_tag(385);
});


