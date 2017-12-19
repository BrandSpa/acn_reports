

export const stopScroll = ($fp) => {
  const emmiter = window.mitt;

  emmiter.on("stop:scroll", function() {
    $("body").addClass("scroll-stoped");
    $fp.setAllowScrolling(false);
  })
}

export const allowScroll = ($fp) => {
  const emmiter = window.mitt;

  emmiter.on("allow:scroll", function() {
    $("body").removeClass("scroll-stoped");
    $fp.setAllowScrolling(true);
  })
}
