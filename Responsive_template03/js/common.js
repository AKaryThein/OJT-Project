$(document).ready(function () {
    //$('.menu-icon').click(function () {
    //  if ($(this).hasClass('active')) {
    //    $('.menu-icon').removeClass('active');
    //  }
    //  else {
    //    $('.menu-icon').addClass('active');
    //  }
    //});

    $('.menu-icon').click(function () {
        $(this).toggleClass('active');
        $('.gnav').toggleClass('active');

        //    var rightVal = 0;
        //    if($(this).hasClass('active')){
        //      rightVal = -375;
        //      $(this).removeClass('active');
        //    }else{
        //      $(this).addClass('active');
        //    }
        //
        //    $('.gnav').stop().animate({
        //      right: rightVal
        //    }, 200);

    });
});