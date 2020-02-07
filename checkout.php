<?php

// エラー出力する場合
ini_set( 'display_errors', 1 );

mb_language('ja');
mb_internal_encoding("utf-8");

require_once( dirname(__FILE__).'/lib/stripe-php-7.23.0/init.php');

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_FMOBRy7iUyoDkZsLAaYUhwh0");

// Token is created using Stripe.js or Checkout!
// Get the payment token submitted by the form:
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];

// フォームから情報を取得:
try {
  $charge = \Stripe\Charge::create(array(
    "amount" => 金額,
    "currency" => "jpy",
    "source" => $token,
    "description" => "商品名",
  ));
}catch (\Stripe\Error\Card $e) {
  // 決済できなかったときの処理
  die('決済が完了しませんでした');
}



// 自動返信メール
mb_language("Japanese");
mb_internal_encoding("UTF-8");
$title = "自動返信メールタイトル";
$content = "ここに自動返信メールの本文を記載。改行したいときは　\n　でできます。";

$from_name = "小宮秀一";
$from_addr = "info@komish.com";
$from_name_enc = mb_encode_mimeheader($from_name, "ISO-2022-JP");
$from = $from_name_enc . "<" . $from_addr . ">";
$header  = "From: " . $from . "\n";
$header = $header . "Reply-To: " . $from;

//to user send mail
    
if(mb_send_mail($email,$title, $content, $header, "-f" .$from_addr)){
  echo "メールを送信しました";
} else {
  echo "メールの送信に失敗しました";
};



// 管理者宛メール
$title_me = "決済通知";
$from_me = "info@komish.com";
$content_me = "ここに管理者宛メールの本文を記載。改行したいときは　\n　でできます。";
if(mb_send_mail($from_me,$title_me, $content_me, $header, "-f" .$from_addr)){
  echo "メールを送信しました";
} else {
  echo "メールの送信に失敗しました";
};

// サンキューページへリダイレクト
header('Location: /malmag-thanks');
exit;

?>
