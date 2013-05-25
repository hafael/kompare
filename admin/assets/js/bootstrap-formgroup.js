


!function($){

  


 

  $(function () {

    //$('.groupSelector a:first, .form-group:first').addClass('active');
    $('.groupSelector a:first').addClass('active');
    $('.form-group:first').show();
    
    $('.groupSelector a').click(function(){
      //$('.groupSelector a, .form-group').removeClass('active');
      $('.groupSelector a').removeClass('active');
      $('.form-group').hide();
      var element = $(this).attr('href');
      //$('.form-group'+element).addClass('active');
      $('.form-group'+element).fadeIn(400);
      $(this).addClass('active');
      return false
    });

  })

}(window.jQuery);