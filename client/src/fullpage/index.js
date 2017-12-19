import $ from "jquery";
import "lazysizes";
import "fullpage.js";
import "lazysizes/plugins/respimg/ls.respimg";
import "lazysizes/plugins/bgset/ls.bgset";

import slidePost from  "./slide_post";
import slideVideo from "./slide_video";
import slideMap from "./slider_map";
import nav from "./nav";
import menu from "./menu";
import modal from "./modal";
import { stopScroll, allowScroll } from "./funs";

window.fp_options = window.fp_options || {};

window.lazySizesConfig = window.lazySizesConfig || {};
window.lazySizesConfig.init = false;

$(document).ready(function DOMLoaded() {

  const emmiter = window.mitt;

  $(".section__content").on("click", () => emmiter.emit("close:all"));

  $(document).on("click", (e) => emmiter.emit("click:document", e));

  $(document).keyup(function(e) {
    if (e.keyCode === 27) emmiter.emit("close:esc");   // esc
  });

  function handleAfterRender() {
    lazySizes.init();
  }

  function handleLeave(index, nextIndex, direction) {
    var next = nextIndex - 1;
    var $section = $(".section:eq(" + next + ")");
  }

  function handleAfterLoad(section, index) {
    let next = index - 1;
    let $section = $(".section:eq(" + next + ")");
    let story = $section.data("story");
    let slideIndex = $section.data("index");
    let redirectUrl = $section.data("redirect");
    let $indicator = $(".indicator");
    let title = fp_options["titles"].filter(title => title.story == story);

    $indicator.find(".indicator__story").text(story);
    $indicator.find(".indicator__index").text(slideIndex);

    if(title[0] && title[0].title) {
      $indicator.find(".indicator__title").text(title[0].title);
    }

  }

  const isTouchDevice = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|playbook|silk|BlackBerry|BB10|Windows Phone|Tizen|Bada|webOS|IEMobile|Opera Mini)/);
  const scrollElements = isTouchDevice ? ".section__post__content, .spot-content__container, .nineveh-general-content__container, .section__modal__content" : "";
  navigator.userAgent.match(/(IEMobile)/);

  $("#fullpage").fullpage({
    menu: "#fullpage-menu",
    lazyLoading: false,
    navigation: false,
    scrollingSpeed: 1000,
    normalScrollElements: scrollElements,
    afterRender: handleAfterRender,
    afterLoad: handleAfterLoad,
    onLeave: handleLeave,
    fadingEffect: true
  });

  if($("#fullpage").length > 0) {
    const $fp = $.fn.fullpage;

    emmiter.on("stop:scroll", function() {
      console.log("stop:scroll");
      $("body").addClass("scroll-stoped");
      $.fn.fullpage.setAllowScrolling(false);
    });

    emmiter.on("allow:scroll", function() {
      console.log("allow:scroll");
      $("body").removeClass("scroll-stoped");
      $.fn.fullpage.setAllowScrolling(true);
    });

    slidePost($fp);
    slideVideo($fp);
    slideMap($fp);
    nav($fp);
    modal($fp);
    menu();
  }

  function goDown() {
    $.fn.fullpage.moveSectionDown();
  }

  $(document).on("click", ".section__down", goDown);

  function closeIntro() {
    // emmiter.emit("allow:scroll");
    $(".intro").addClass("intro--close");
  }

  if(window.location.hash !== "") {
    closeIntro();
  }

  setTimeout(function introDelay() {
    closeIntro();
  }, fp_options.introDelay);


});
