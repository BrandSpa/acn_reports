
function nav($fp) {

  const emmiter = window.mitt;

  function openNav(e) {
    if(e) e.preventDefault();
    emmiter.emit("stop:scroll");
    $(".fullpage-nav").addClass("fullpage-nav--open");
    $(".fullpage__menu").addClass("fullpage__menu--dark");
  }

  function closeNav(e) {
    if($(".fullpage-nav--open").length > 0) {
      emmiter.emit("allow:scroll");
      $(".fullpage-nav").removeClass("fullpage-nav--open");
      $(".fullpage__menu").removeClass("fullpage__menu--dark");
    }
  }

  //Events
  $(".indicator").on("click", openNav);
  $(".fullpage-nav__close").on("click", closeNav);
  $(".fullpage-nav a").on("click", closeNav);
  emmiter.on("close:all", closeNav);
  emmiter.on("close:esc", closeNav);

}

export default nav;
