$(function () {
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
