<?php
session_start();

// 入力画面からではなくURLを直接入れてのアクセスの場合、コンタクト画面に戻る
if (!isset($_SESSION['form'])) {
  header('Location: contact.php');
  exit();
} else {
  $post = $_SESSION['form'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // メールを送信
  $to = 'info@twyinvestment.jp';
  $from = $post['meil'];
  $subject = 'お問合せが届きました';
  $body = <<<EOT
お問い合わせ区分：　{$post['requirement']}
お客様名：　{$post['name']}
お客様名フリガナ：　{$post['name-kana']}
会社名/組織名：　{$post['company']}
電話番号：　{$post['phone']}
メールアドレス：　{$post['meil']}
ご希望の連絡方法：　{$post['contact']}
お問い合わせ内容：
{$post['text']}
EOT;


  if(isset($_POST['back'])) {
    header('Location: contact.php');
    exit();
  } else if (isset($_POST['send'])) {  
  // セッションを削除して、サンクスページへ
  mb_send_mail($to, $subject, $body, "From: {$from}");
  unset($_SESSION['form']);
  header('Location: thunks.html');
  exit();
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-217793752-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-217793752-1');
  </script>
  <meta name="google-site-verification" content="2me5T-NPOyL2f3J5foPquwBFT434upz2FTa35fHPSVM" />

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="discription" content="株式会社TwYインベストメントの公式HPのお問い合わせページです">
  <title>TwY Investment Inc. </title>
  <link rel="stylesheet" href="../fontawesome-free-5.15.3-web/css/all.min.css">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/modal.css">
  <link rel="stylesheet" href="../css/lightbox.min.css">
  <link rel="stylesheet" href="../css/responsive.css">
</head>
<body>

  <h1>確認画面</h1>
  <div class="modal-window">
    <div class="modal-form-contents">
      <div class="form-items">
        <div class="form-contents">
          <p>お問い合わせ区分</p>
          <p><?php echo htmlspecialchars($post['requirement']) ?></p>
        </div>
        <div class="form-contents">
          <p>お客様名</p>
          <p><?php echo htmlspecialchars($post['name']) ?></p>
        </div>
        <div class="form-contents">
          <p>お客様名フリガナ</p>
          <p><?php echo htmlspecialchars($post['name-kana']) ?></p>
        </div>
        <div class="form-contents">
          <p>会社名/組織名</p>
          <p><?php echo htmlspecialchars($post['company']) ?></p>
        </div>
        <div class="form-contents">
          <p>電話番号</p>
          <p><?php echo htmlspecialchars($post['phone']) ?></p>
        </div>
        <div class="form-contents">
          <p>メールアドレス</p>
          <p><?php echo htmlspecialchars($post['meil']) ?></p>
        </div>
        <div class="form-contents">
          <p>ご希望の連絡方法</p>
          <p><?php echo htmlspecialchars($post['contact']) ?></p>
        </div>
        <div class="form-contents">
          <p>お問い合わせ内容</p>
          <p><?php echo nl2br(htmlspecialchars($post['text'])) ?></p>
        </div>
      </div>

      <form action="" method="POST">
        <div class="form-button">
          <input type="submit" name="back" class="button-left" value="内容を修正する">
          <input type="submit" name="send" class="button-right submit-button" value="入力情報を送信">
        </div>
      </form>

    </div>
  </div>

</body>
</html>