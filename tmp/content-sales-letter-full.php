<?php //投稿・固定ページ本文
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article') ?> itemscope="itemscope" itemprop="blogPost" itemtype="https://schema.org/BlogPosting">
  <?php
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>

      <header class="article-header entry-header">
        <h1 class="entry-title" itemprop="headline">
          <?php
            the_title();
           ?>
        </h1>

        <?php //投稿日と更新日テンプレート
        get_template_part('tmp/date-tags'); ?>

      </header>

      <div class="entry-content cf<?php echo get_additional_entry_content_classes(); ?>" itemprop="mainEntityOfPage">
      <?php //記事本文の表示
        the_content(); ?>
      </div>

      <footer class="article-footer entry-footer">
        <!-- publisher設定 -->
        <?php
        $home_image_url = get_amp_logo_image_url();
        $size = get_image_width_and_height($home_image_url);
        $width = isset($size['width']) ? $size['width'] : 600;
        $height = isset($size['height']) ? $size['height'] : 60;

        $sizes = calc_publisher_image_sizes($width, $height);
        $width = $sizes ? $sizes['width'] : 600;
        $height = $sizes ? $sizes['height'] : 60;
         ?>
        <div class="publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
            <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
              <img src="<?php echo $home_image_url; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="">
              <meta itemprop="url" content="<?php echo $home_image_url; ?>">
              <meta itemprop="width" content="<?php echo $width; ?>">
              <meta itemprop="height" content="<?php echo $height; ?>">
            </div>
            <div itemprop="name"><?php bloginfo('name'); ?></div>
        </div>
      </footer>

    <?php
    } // end while
  } //have_posts end if ?>
</article>
