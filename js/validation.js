
$(function () {
  // $("#postForm").validate({
  //   rules: {
  //     requirement: {
  //       required: true,
  //     },
  //     name: {
  //       required: true,
  //     },
  //   },
  //   messages: {
  //     requirement: {
  //       required: 'お問い合わせ区分を入力してください',
  //     },
  //     name: {
  //       required: 'お客様名を入力してください',
  //     },
  //   },

  //   errorPlacement: function(error, element){
  //     // console.log(error[0]);
  //     var errorKey = $(element).attr('name') + 'Error';
  //     $('#error_' + errorKey).remove();
  //     element.addClass('is-invalid');
  //     const errorP = $('<p>').text(error[0].innerText);
  //     const errorDiv = $('<div class="invalid-feedback" id="error_' + errorKey + '">').append(errorP);
  //     element.parent().append(errorDiv);
  //   },

  // });

  // $("input[name=name]").blur(function() {
  //   console.log($("#postForm").valid());
  //   if(!$("#postForm").valid()) {
  //     alert('入力にエラーがあります');
  //   } else {
  //     console.log('成功です')
  //   }
  // })
  // $("#pre-submit").click(function() {
  //   console.log($("#postForm").valid());
  //   if(!$("#postForm").valid()) {
  //     alert('入力にエラーがあります');
  //   } else {
  //     console.log('成功です')
  //   }
  // })

  // function scroll() {
  //   $top = $(".error-input").parent().offset().top;
  //   $('body, html').animate({
  //     scrollTop: $top
  //   }, 500);
  // }

  // function modalView() {
  //   // モーダルウィンドウを表示
  //   $('#musk, .modal-window').fadeIn();
  //   $(".modal-form-contents").empty();  
  //   // スクロールを無効
  //   $('html *').css('overflow','hidden');
  //   $(window).on('touchmove.noScroll', function(e) {
  //     e.preventDefault();
  //   })
  // }

  // function modalHide() {
  //   // モーダルウィンドウを非表示
  //   $('#musk, .modal-window').fadeOut();
  //   // スクロールの無効解除
  //   $('html *').css('overflow','visible');
  //   $(window).off('.noScroll');    
  // }


  // $("#pre-submit").on('click', function() {
  //   $requirement = $("input[name=requirement]").val();
  //   $name = $("input[name=name]").val();
  //   $name_kana = $("input[name=name-kana]").val();
  //   $company = $("input[name=company]").val();
  //   $phone = $("input[name=phone]").val();
  //   $meil = $("input[name=meil]").val();
  //   $contact = $("input[name=contact]").val();
  //   $text = $("textarea[name=text]").val();
  //   var $required = true;
  //   $(".error-input").remove();
  
  //   if(!$requirement.length) {
  //     $("input[name=requirement]").before(
  //       `<p class='error-input'>必須項目です</p>`
  //     )
  //     $required = false;
  //   }
  //   if(!$name.length) {
  //     $("input[name=name]").before(
  //       `<p class='error-input'>必須項目です</p>`
  //     )
  //     $required = false;
  //   } 
  //   if(!$name_kana.length) {
  //     $("input[name=name-kana]").before(
  //       `<p class='error-input'>必須項目です</p>`
  //     )
  //     $required = false;
  //   }
  //   if(!$phone.length) {
  //     $("input[name=phone]").before(
  //       `<p class='error-input'>必須項目です</p>`
  //     )
  //     $required = false;
  //   }
  //   if(!$meil.length) {
  //     $("input[name=meil]").before(
  //       `<p class='error-input'>必須項目です</p>`
  //     )
  //     $required = false;
  //   }
  //   if(!$contact.length) {
  //     $("input[name=contact]").before(
  //       `<p class='error-input'>必須項目です</p>`
  //     )
  //     $required = false;
  //   }
  //   if(!$text.length) {
  //     $("input[name=text]").before(
  //       `<p class='error-input'>必須項目です</p>`
  //     )
  //     $required = false;
  //   }


  //   if($required) {
  //     modalView();
  //   } else {
  //     scroll();
  //     modalHide();
  //   }
  // })
});

// $(function(){
//   $('#postForm').validate({
//     rules: {
//       formTitle: {
//         required: true,
//         maxlength: 10,
//       },
//     },
//     messages: {
//       formTitle: {
//         required: 'タイトルを入力してください。',
//         maxlength: 'タイトルは10字以内でご入力ください。',
//       },
//     },
//     errorPlacement: function(error, element){
//       console.log(error[0]);
//       var errorKey = $(element).attr('id') + 'Error';
//       $('#error_' + errorKey).remove();
//       element.addClass('is-invalid');
//       const errorP = $('<p>').text(error[0].innerText);
//       const errorDiv = $('<div class="invalid-feedback" id="error_' + errorKey + '">').append(errorP);
//       element.parent().append(errorDiv);
//     },
//     success: function(error, element) {
//       var errorKey = $(element).attr('id') + 'Error';
//       $('#error_' + errorKey).remove();
//       $(error).remove();
//       $(element).removeClass('is-invalid');
//       $(element).removeClass('error');
//     },
//   });
// });