$(function() {

  function scroll() {
    $top = $(".error-input").parent().offset().top;
    $('body, html').animate({
      scrollTop: $top
    }, 500);
  }

  function modalView() {
    // モーダルウィンドウを表示
    $('#musk, .modal-window').fadeIn();
    $(".modal-form-contents").empty();  
    // スクロールを無効
    $('html *').css('overflow','hidden');
    $(window).on('touchmove.noScroll', function(e) {
      e.preventDefault();
    })
  }

  function modalHide() {
    // モーダルウィンドウを非表示
    $('#musk, .modal-window').fadeOut();
    // スクロールの無効解除
    $('html *').css('overflow','visible');
    $(window).off('.noScroll');    
  }


  var count = 0;
  $(".js-open").on('click', function() {
    if(0 < count) {
      $(".error-input").remove();
      $("input[type=text]").removeClass('input-red');
      $("textarea").removeClass('input-red');
    }

    $requirement = $("input[name=requirement]:checked").val();
    $name = $("input[name=name]").val();
    $name_kana = $("input[name=name-kana]").val();
    $company = $("input[name=company]").val();
    $phone = $("input[name=phone]").val();
    $meil = $("input[name=meil]").val();
    $contact = $("input[name=contact]:checked").val();
    $text = $("textarea[name=text]").val();
    $agree = $("input[type=checkbox]:checked").val();


    // if ($(".error-input").length) {
    //   $(".error-input").remove();
    //   $(input[type=text]).removeClass('input-red');
    //   $(textarea).removeClass('input-red');
    // }
    
    var $required = true;

    if(!$requirement) {
      $("input[name=requirement]").parent().parent().before(
        `<p class='error-input'>＊選択してください</p>`
      )
      $required = false;
    }
    if(!$name.length) {
      $("input[name=name]").before(
        `<p class='error-input'>＊必須項目です</p>`
      )
      $("input[name=name]").addClass('input-red');
      // $("input[name=name]").css({
      //   'border': 'solid 2px red'
      // });

      $required = false;
    } 
    if(!$name_kana.length) {
      $("input[name=name-kana]").before(
        `<p class='error-input'>＊必須項目です</p>`
      )
      $("input[name=name-kana]").addClass('input-red');
      $required = false;
    }
    if(!$phone.length) {
      $("input[name=phone]").before(
        `<p class='error-input'>＊必須項目です</p>`
      )
      $("input[name=phone]").addClass('input-red');
      $required = false;
    }
    if(!$meil.length) {
      $("input[name=meil]").before(
        `<p class='error-input'>＊必須項目です</p>`
      )
      $("input[name=meil]").addClass('input-red');
      $required = false;
    }
    if(!$contact) {
      $("input[name=contact]").parent().parent().before(
        `<p class='error-input'>＊選択してください</p>`
      )
      $required = false;
    }
    if(!$text.length) {
      $("textarea[name=text]").before(
        `<p class='error-input'>＊必須項目です</p>`
      )
      $("textarea[name=text]").addClass('input-red');
      $required = false;
    }

    if(!$agree) {
      $("input[type=checkbox]").before(
        `<p class='error-input'>＊チェックを入れてください</p>`
      )
      $required = false;
    }

    if($required) {
      modalView();
      $(".modal-form-contents").append(
        `<div class="form-contents">
          <p>お問い合わせ区分</p>
          <p>${$requirement}</p>
        </div>`
      )
      $(".modal-form-contents").append(
        `<div class="form-contents">
          <p>お客様名</p>
          <p>${$name}</p>
        </div>`
      )
      $(".modal-form-contents").append(
        `<div class="form-contents">
          <p>お客様名フリガナ</p>
          <p>${$name_kana}</p>
        </div>`
      )
      $(".modal-form-contents").append(
        `<div class="form-contents">
          <p>会社名/組織名</p>
          <p>${$company}</p>
        </div>`
      )
      $(".modal-form-contents").append(
        `<div class="form-contents">
          <p>電話番号</p>
          <p>${$phone}</p>
        </div>`
      )
      $(".modal-form-contents").append(
        `<div class="form-contents">
          <p>メールアドレス</p>
          <p>${$meil}</p>
        </div>`
      )
      $(".modal-form-contents").append(
        `<div class="form-contents">
          <p>ご希望の連絡方法</p>
          <p>${$contact}</p>
        </div>`
      )
      $(".modal-form-contents").append(
        `<div class="form-contents">
          <p>お問い合わせ内容</p>
          <p>${$text}</p>
        </div>`
      )
    } else {
      scroll();
      modalHide();
    }

    count++;
  })



  $(".js-close, #musk").on('click', function() {
    modalHide();
  })



})