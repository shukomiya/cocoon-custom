<?php
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit; ?>
          </main>

        <?php get_sidebar(); ?>

      </div>

    </div>


    <footer id="footer" class="footer footer-container nwa" itemscope itemtype="https://schema.org/WPFooter">

      <div id="footer-in" class="footer-in wrap cf">

		<div class="footer-bottom<?php echo get_additional_footer_bottom_classes(); ?> cf">
		
		  <div class="footer-bottom-content">
			<nav id="navi-footer" class="navi-footer">
			  <div id="navi-footer-in" class="navi-footer-in">
			    <?php wp_nav_menu(
			      array (
			        //カスタムメニュー名
			        'theme_location' => NAV_MENU_FOOTER,
			        //ul 要素に適用するCSS クラス名
			        'menu_class' => 'menu-footer',
			        //コンテナを表示しない
			        'container' => false,
			        //カスタムメニューを設定しない際に固定ページでメニューを作成しない
			        'fallback_cb' => false,
			        //出力されるulに対してidやclassを表示しない
			        //'items_wrap' => '<ul>%3$s</ul>',
			        //メニューの深さ
			        'depth' => 1,
			      )
			    ); ?>
			  </div>
			</nav>
		
		    <div class="source-org copyright">Copyright &copy; 2008-<?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a> All rights reserverd.</div>
		  </div>
		
		</div>

      </div>

    </footer>

  </div>

  <?php //トップへ戻るボタンテンプレート
  get_template_part('tmp/button-go-to-top'); ?>

  <?php //管理者用パネル
  get_template_part('tmp/admin-panel'); ?>

  <?php //モバイルヘッダーメニューボタン
  get_template_part('tmp/mobile-header-menu-buttons'); ?>

  <?php //モバイルフッターメニューボタン
  get_template_part('tmp/mobile-footer-menu-buttons'); ?>

  <?php if (!is_amp()) wp_footer(); ?>

  <?php //フッターで読み込むJavaScript用テンプレート
  get_template_part('tmp/footer-javascript');?>

<?php sk_get_access_analy_google(); ?>

  <?php //カスタムフィールドの挿入（カスタムフィールド名：footer_custom）
  get_template_part('tmp/footer-custom-field');?>

  <?php //アクセス解析フッタータグの取得
  get_template_part('tmp/footer-analytics'); ?>

  <?php //フッター挿入用のユーザー用テンプレート
  if (is_amp()) {
    //AMP用のフッターアクションフック
    do_action( 'wp_amp_footer_insert_open' );
    //親テーマのAMPフッター用
    get_template_part('tmp/amp-footer-insert');
    //子テーマのAMPフッター用
    get_template_part('tmp-user/amp-footer-insert');
  } else {
    //フッター用のアクションフック
    do_action( 'wp_footer_insert_open' );
    //フッター用のテンプレート
    get_template_part('tmp-user/footer-insert');
  }
  ?>

</body>

</html>
