<?php
session_start();
$error = [];

// contact.phpのmethodはGETで呼び出される。送信ボタンを押すとPOSTで呼び出される。
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // postメソッドのデータを一括管理
  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  // フォームの送信時にエラーをチェックする
  if(!($post['requirement'] === "ご相談" || $post['requirement'] === "採用について" || $post['requirement'] === "その他")) {
    $error['requirement'] = 'blank';
  }
  if($post['name'] === '') {
    $error['name'] = 'blank';
  }
  if($post['name-kana'] === '') {
    $error['name-kana'] = 'blank';
  }
  if($post['phone'] === '') {
    $error['phone'] = 'blank';
  }
  if($post['meil'] === '') {
    $error['meil'] = 'blank';
  } else if(!filter_var($post['meil'], FILTER_VALIDATE_EMAIL)) {
    // メールのバリデーション
    $error['meil'] = 'meil';
  }
  if(!($post['contact'] === "電話" || $post['contact'] === 'メールアドレス')) {
    $error['contact'] = 'blank';
  }
  if($post['text'] === '') {
    $error['text'] = 'blank';
  }
  if($post['check'] == false) {
    $error['check'] = 'blank';
  }
  
  // エラーがない場合は、確認画面に移動
  if(count($error) === 0) {
    $_SESSION['form'] = $post;
    header('Location: confirm.php');
    exit;
  }

} else {
  if(isset($_SESSION['form'])) {
    // 確認画面から戻った時に入力していたものを引き継ぐ
    $post = $_SESSION['form'];
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
  <meta name="discription" content="企業理念である「真のウェルスマネジメントサービスを提供する」のもと、お客様と何代にも渡って共存していくことを目指し、中立・公正な立場で資産づくり・資産管理のお手伝いをさせていただきます。">
  <title>株式会社TwYインベストメント | お問い合わせ</title>
  <link rel="stylesheet" href="../fontawesome-free-5.15.3-web/css/all.min.css">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/contents.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/bread-list.css">
  <link rel="stylesheet" href="../css/lightbox.min.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="stylesheet" href="../css/modal.css">
</head>
<body>

  <div class="wrapper">

    <!-- headerセクション -->
    <div class="header-wrapper">
      <div class="header-top">
        <h1 class="icon-left">
          <a rel="start" class="header-logo" href="../index.html">
            TwY Investment Inc.
          </a>
        </h1>
        <div class="icon-right">
          <!-- <p class="header-text">"地域に根付いた歯科医院" デンタル クリニック</p> -->
          <div class="header-call-section">
            <div class="header-call">
              <i class="fas fa-phone-alt fa-xs"></i>
              <a rel="tel" class="tel-number" href="tel:+81-45-595-9758">045-595-9758</a>
            </div>
            <!-- <p class="header-time">予約受付時間 10:00~19:30 <span class="header-span">日祝 休診</span></p> -->
          </div>
        </div>
      </div>
      
      <div class="nav-section">
        <nav class="nav">
          <ul class="nav-content">
            <a rel="start" class="nav-link" href="../index.html">
              <li class="nav-item fast">
                <div class="nav-title">
                  <p class="nav-title-ja">トップページ</p>
                  <p class="nav-title-en">HOME</p>
                </div>
              </li>
            </a>
            <a rel="contents" class="nav-link" href="../company/business.html">
              <li class="nav-item">
                <div class="nav-title">
                  <p class="nav-title-ja">事業内容</p>
                  <p class="nav-title-en">BUSINESS</p>
                </div>
              </li>
            </a>
            <a rel="contents" class="nav-link" href="../company/information.html">
              <li class="nav-item">
                <div class="nav-title">
                  <p class="nav-title-ja">企業情報</p>
                  <p class="nav-title-en">INFORMATION</p>
                </div>
              </li>
            </a>
            <a rel="contents" class="nav-link" href="../company/access.html">
              <li class="nav-item">
                <p class="nav-title">
                  <span class="nav-title-ja">アクセス</span>
                  <span class="nav-title-en">ACCESS</span>
                </p>
              </li>
            </a>
            <a rel="contents" class="nav-link" href="../company/contact.php">
              <li class="nav-item last">
                <div class="nav-title">
                  <p class="nav-title-ja">お問い合わせ</p>
                  <p class="nav-title-en">CONTACT</p>
                </div>
              </li>
              </a>
          </ul>
        </nav>
      </div>
    </div>


    
    <div class="contents-wrapper">

      <!-- ここからパンクズリスト -->
      <div class="bread-list-content">
        <nav>
          <ol class="bread-list">
            <li><a rel="start" href="../index.html">トップページ</a></li>
            <li>お問い合わせ</li>
          </ol>
        </nav>
      </div>
      <!-- ここまでがパンクズリスト -->

      <div class="content-right">

        <h2 class="content-right-title">お問い合わせ</h2>
        <div class="content-right-item">
          <div class="contact">
            <form id="postForm" class="contact-form" action="" method="POST" novalidate>
              <div class="form-item">
                <div class="contact-label">
                  <p class="required">必須</p>
                  <h3 class="">お問い合わせ区分</h3>
                </div>
                <?php if($error['requirement'] === 'blank'): ?>
                  <p class='error-input'>＊選択してください</p>
                <?php endif; ?>
                <div class="radio-button">
                  <label><input type="radio" name="requirement" value="ご相談" required 
                    <?php
                    if($post['requirement'] === "ご相談") {
                      echo 'checked';
                    }
                    ?>
                  >ご相談</label>
                  <label><input type="radio" name="requirement" value="採用について" 
                    <?php
                    if($post['requirement'] === "採用について") {
                      echo 'checked';
                    }
                    ?>
                  required>採用について</label>
                  <label><input type="radio" name="requirement" value="その他" 
                    <?php
                    if($post['requirement'] === "その他") {
                      echo 'checked';
                    }
                    ?>
                  required>その他</label>
                </div>  
              </div>
              <div class="form-item">
                <div class="contact-label">
                  <p class="required">必須</p>
                  <h3 class="">お客様名</h3>
                </div>
                <?php if($error['name'] === 'blank'): ?>
                  <p class='error-input'>＊必須項目です</p>
                <?php endif; ?>
                <input type="text" placeholder="山田　太郎" name="name" value="<?php echo htmlspecialchars($post['name']); ?>" required>
              </div>
              <div class="form-item">
                <div class="contact-label">
                  <p class="required">必須</p>
                  <h3>お客様名フリガナ</h3>
                </div>
                <?php if($error['name-kana'] === 'blank'): ?>
                  <p class='error-input'>＊必須項目です</p>
                <?php endif; ?>
                <input type="text" placeholder="ヤマダ　タロウ" name="name-kana" value="<?php echo htmlspecialchars($post['name-kana']); ?>" required>
              </div>
              <div class="form-item">
                <div class="contact-label">
                  <h3>会社名/組織名</h3>
                </div>
                <input type="text" placeholder="会社名/組織名をご記入ください" name="company" value="<?php echo htmlspecialchars($post['company']); ?>">
              </div>
              <div class="form-item">
                <div class="contact-label">
                  <p class="required">必須</p>
                  <h3>電話番号</h3>
                </div>
                <?php if($error['phone'] === 'blank'): ?>
                  <p class='error-input'>＊必須項目です</p>
                <?php endif; ?>
                <input type="text" placeholder="01-2345-6789" name="phone" value="<?php echo htmlspecialchars($post['phone']); ?>" required>
              </div>
              <div class="form-item">
                <div class="contact-label">
                  <p class="required">必須</p>
                  <h3>メールアドレス</h3>
                </div>
                <?php if($error['meil'] === 'blank'): ?>
                  <p class='error-input'>＊必須項目です</p>
                <?php endif; ?>
                <?php if($error['meil'] === 'meil'): ?>
                  <p class='error-input'>＊正しく記入してください</p>
                <?php endif; ?>
                <input type="text" placeholder="メールアドレスをご記入ください" name="meil" value="<?php echo htmlspecialchars($post['meil']); ?>" required>
              </div>
              <div class="form-item">
                <div class="contact-label">
                  <p class="required">必須</p>
                  <h3>ご希望の連絡方法</h3>
                </div>
                <?php if($error['contact'] === 'blank'): ?>
                  <p class='error-input'>＊選択してください</p>
                <?php endif; ?>
                <div class="radio-button">
                  <label ><input type="radio" name="contact" value="電話" 
                    <?php
                    if($post['contact'] === "電話") {
                      echo 'checked';
                    }
                    ?>
                  required>電話</label>
                  <label ><input type="radio" name="contact" value="メールアドレス" 
                    <?php
                    if($post['contact'] === "メールアドレス") {
                      echo 'checked';
                    }
                    ?>
                  required>メールアドレス</label>
                </div>
              </div>
              <div class="form-item">
                <div class="contact-label">
                  <p class="required">必須</p>
                  <h3>お問い合わせ内容</h3>
                </div>
                <?php if($error['text'] === 'blank'): ?>
                  <p class='error-input'>＊必須項目です</p>
                <?php endif; ?>
                <textarea placeholder="ご入力ください" name="text" required><?php echo htmlspecialchars($post['text']); ?></textarea>
              </div>

              <div class="submit">
                <?php if($error['check'] === 'blank'): ?>
                  <p class="error-input">＊チェックを入れてください</p>
                <?php endif; ?>
                <input type="checkbox" name="check" <?php if($post['check'] == true) {echo 'checked';} ?> required><a href="../pdf/個人情報保護の基本方針 (1).pdf" target="_blank">個人情報保護の基本方針</a>に同意<br>
                <input type="submit" id="pre-submit" value="確認画面へ">
              </div>
            </form>

          </div>
          
        </div>
      </div>




      
      <div class="content-left">
        <div class="menu">
          <h2 class="menu-title">明示事項・方針</h2>
          <nav class="menu-item">
            <ul class="menu-contents">
              <li class="menu-list">
                <a rel="license" class="menu-text-link01" href="../pdf/金融商品仲介業者の商号等の明示.pdf" target="_blank">
                  <p class="menu-text01">明示事項</p>
                </a>
              </li>
              <li class="menu-list">
                <a rel="license" class="menu-text-link01" href="../pdf/弊社の勧誘方針.pdf" target="_blank">
                  <p class="menu-text01">弊社の勧誘方針</p>
                </a>
              </li>
              <li class="menu-list">
                <a rel="license" class="menu-text-link01" href="../pdf/個人情報保護宣言.pdf" target="_blank">
                  <p class="menu-text01">個人情報保護宣言</p>
                </a>
              </li>
              <li class="menu-list">
                <a rel="license" class="menu-text-link01" href="../pdf/お客様の個人情報の利用目的.pdf" target="_blank">
                  <p class="menu-text01">個人情報の利用目的</p>
                </a>
              </li>
              <li class="menu-list">
                <a rel="license" class="menu-text-link01" href="../pdf/金融商品仲介業に関する個人情報保護規程.pdf" target="_blank">
                  <p class="menu-text01">金融商品仲介業に関する個人情報保護規定</p>
                </a>
              </li>
              <li class="menu-list">
                <a rel="license" class="menu-text-link01" href="../pdf/お客様本位の業務運営方針.pdf" target="_blank">
                  <p class="menu-text01">お客様本位の業務運営方針</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>



    </div>

    <div class="footer-wrapper">
      <div class="footer">

        <div class="copyright">
        </div>

        <div class="footer-address">
          <p class="footer-address-text strong">TwY Investment Inc.</p>
          <p class="footer-address-text">　神奈川県横浜市神奈川区鶴屋町3-30-1-2F</p>
          <p class="footer-address-text">　TEL:045-595-9758</p>
        </div>


      </div>
    </div>

  </div>
  
</body>
</html>