// CSSインポート
import "../sass/app.scss";

// JSインポート
import "@fortawesome/fontawesome-free/js/all";
import "bootstrap";
import slick from "slick-carousel";
require("jquery-drawer");

// 基本設定
require("./common");

$(function () {
  // 対応エリア
  $(".badge-area").on("click", function () {
    let id = $(this).attr("data-id");
    $(".badge-area").removeClass("active");
    $(this).addClass("active");

    $(".area-text").removeClass("active");
    $('[data-areaid="' + id + '"]').addClass("active");
  });

  // よくある質問
  $(".faq__box").on("click", function () {
    $(this).children("div").slideToggle("fast");
    $(this).toggleClass("active");
  });
});
