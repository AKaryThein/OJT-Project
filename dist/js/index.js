//const menu = document.querySelector("#menu");
//const gnav = document.querySelector("#gnav");
//
//menu.addEventListener('click', () => {
//  if (gnav.classList.contains('hidden')){
//    gnav.classList.remove('hidden');
//  }
//  else {
//    gnav.classList.add('hidden');
//  }
//});

$(document).ready(function () {
  $(".cross").hide();
  $("#menu").on("click", function () {
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
      $(".bar").hide();
      $(".cross").show();
    } else {
      $(".cross").hide();
      $(".bar").show();
    }
    $("#gnav").toggleClass("is-show");
  });
});
