var $window = $(window);

//tabs link
$(document).ready(function() {
  var $tabsLink = $(".j-tabs-link");
  var $hiddenBlock = $(".j-hidden-block");

  $tabsLink.on("click", function(e) {
    $tabsLink.removeClass("active");
    $(this).addClass("active");
  });
});

//anchor link
$(document).ready(function() {
  var $anchorLink = $(".j-anchor-link");

  $anchorLink.on("click", function(e) {
    var id = $(this).attr("href"),
      top = $(id).offset().top;
    e.preventDefault();

    $(".j-header-menu").removeClass("open");

    $("body,html").animate({ scrollTop: top - 50 + "px" }, 700);
  });
});

//burger menu
$(document).ready(function() {
  var $menu = $(".j-header-menu");

  $(".j-burger-open-link").on("click", function() {
    $menu.addClass("open");
  });

  $(".j-burger-close-link").on("click", function() {
    $menu.removeClass("open");
  });
});
