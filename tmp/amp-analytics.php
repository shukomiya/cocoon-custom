<?php //Google Analyticsコード（ログインユーザーはカウントしない）
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
 
global $g_analy_g_acount;

if ( !defined( 'ABSPATH' ) ) exit;

//タグマネージャIDが設定されているときは計測しない
if ( is_analytics() && !get_google_tag_manager_tracking_id() ) {
  //AMP用Analyticsトラッキングコードを設定している場合
  $tracking_id = get_google_analytics_tracking_id();
  $after_title = '[AMP]';

}
?>

<!-- AMP Google Analytics -->
<amp-analytics type="gtag" data-credentials="include">
<script type="application/json">
{
  "vars" : {
    "gtag_id": "<?php echo $g_analy_g_acount ?>",
    "config" : {
      "<?php echo $g_analy_g_acount ?>": {
		"groups": "default",
		"linker": {"domains": ["komish.com", "plus.komish.com", "www.paypal.com", "www.infocart.jp", "17auto.biz/komish/", "ex-pa.jp"] }
		}
    }
	triggers": {
        "â-link": {
          "selector": "#a-button",
          "on": "click",
          "vars": {
            "event_name": "a-button",
          }
        }
      }
  
  }
}
</script>
</amp-analytics>

