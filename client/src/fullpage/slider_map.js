
function mapPoints($fp) {

  const emmiter = window.mitt;

  let $spotContent;
  let $ninevehGeneralContent;

  function setMapSize() {
    $(".map-points").attr("width", $(window).width());
    $(".map-points").attr("height", $(window).height());

    if($(window).width() < 767 || $(window).width() <  991) {
      $(".map-points").attr("viewBox", "250 0 1920 1080");
      $(".map-points__spots").attr("transform", "translate(-40, 100)");
    }
    $fp.reBuild();
  }

  function openSpotContent(e) {
    if(e) e.preventDefault();

    let content = $(this).data("content");

    if( $(`.spot-content.${content}`).length > 0 ) {
      emmiter.emit("stop:scroll");
      $spotContent = $(`.spot-content.${content}`);
      $(`.spot-content.${content}`).addClass("spot-content--open");
      $(".section__close-spot-content").addClass("section__close-spot-content--open");
    }

  }

  function closeSpotContent(e) {
    if(e) e.preventDefault();
    emmiter.emit("allow:scroll");
    $(".spot-content").removeClass("spot-content--open");
    $(".section__close-spot-content").removeClass("section__close-spot-content--open");
  }

  function openNinevehGeneralContent(e) {
    emmiter.emit("stop:scroll");
    $ninevehGeneralContent = $(".nineveh-general-content");
    $ninevehGeneralContent.addClass("nineveh-general-content--open");
    $(".section__close-nineveh-general").addClass("section__close-nineveh-general--open");
  }

  function closeNinevehGeneralContent(e) {
    if($(".section__close-nineveh-general--open").length > 0) {
      emmiter.emit("allow:scroll");
      $(".section__close-nineveh-general").removeClass("section__close-nineveh-general--open");
      $(".nineveh-general-content").removeClass("nineveh-general-content--open")
    }
  }

  function clickOutsideSpot(evt) {
    if($(evt.target).is($spotContent)) {
      closeSpotContent();
    }
  }

  function clickOutsideGeneralContent(evt) {
    if($(evt.target).is($ninevehGeneralContent)) {
      closeNinevehGeneralContent();
    }
  }

  setMapSize();
  //
  //Events
  $(window).on("resize", () => {
    $fp.reBuild();
    setMapSize();
  });

  $(".map-points__spot").on("click", openSpotContent);
  $(".section__close-spot-content").on("click", closeSpotContent);
  $(".nineveh-general-point").on("click", openNinevehGeneralContent);
  $(".section__close-nineveh-general").on("click", closeNinevehGeneralContent);

  emmiter.on("close:esc", closeNinevehGeneralContent);
  emmiter.on("close:esc", closeSpotContent);
  emmiter.on("click:document", clickOutsideSpot);
  emmiter.on("click:document", clickOutsideGeneralContent);
}

export default mapPoints;
