<?php
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
<?php //ヘッドタグ内挿入用のアクセス解析用テンプレート
get_template_part('tmp/head-analytics'); ?>
<meta charset="utf-8">
<?php //Google Search Consoleのサイト認証IDの表示
if ( get_google_search_console_id() ): ?>
<!-- Google Search Console -->
<meta name="google-site-verification" content="<?php echo get_google_search_console_id() ?>" />
<!-- /Google Search Console -->
<?php endif;//Google Search Console終了 ?>

<?php // force Internet Explorer to use the latest rendering engine available ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php // mobile meta (hooray!) ?>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>


<?php wp_head(); ?>
<?php //headで読み込む必要があるJavaScript
get_template_part('tmp/head-javascript'); ?>

</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php //body最初に挿入するアクセス解析ヘッダータグの取得
get_template_part('tmp/body-top-analytics'); ?>

<?php //サイトヘッダーからコンテンツまでbodyタグ最初のHTML
<div id="container" class="container<?php echo get_additional_container_classes(); ?> cf">

  <div id="content" class="content cf">

    <div id="content-in" class="content-in wrap">

        <main id="main" class="main<?php echo get_additional_main_classes(); ?>" itemscope itemtype="https://schema.org/Blog">
?>
