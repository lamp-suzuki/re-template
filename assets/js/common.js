$(function () {
  // metaタグ
  let ua = navigator.userAgent.toLowerCase();
  let isiOS = ua.indexOf("iphone") > -1 || ua.indexOf("ipad") > -1;
  if (isiOS) {
    var viewport = document.querySelector('meta[name="viewport"]');
    if (viewport) {
      var viewportContent = viewport.getAttribute("content");
      viewport.setAttribute("content", viewportContent + ", user-scalable=no");
    }
  }

  $('a[href^="#"]').on("click", function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });

  // drawer
  $(".drawer").drawer();

  // slick
  $(".home-slide").on("init reInit afterChange", function (event, slick, currentSlide, nextSlide) {
    $(".home-slide__nums .current").text((currentSlide ? currentSlide : 0) + 1);
    $(".home-slide__nums .all").text(slick.slideCount);
  });
  $(".home-slide").slick({
    centerMode: true,
    centerPadding: "10vw",
    slidesToShow: 1,
    autoplay: true,
    prevArrow: '<span class="prev-arrow"><i class="fas fa-caret-left"></i></span>',
    nextArrow: '<span class="next-arrow"><i class="fas fa-caret-right"></i></span>',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          centerMode: false,
          slidesToShow: 1,
        },
      },
    ],
  });
});
