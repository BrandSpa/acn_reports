
function menu() {
  function toggleMenuShare() {
    const $a = $(".fullpage__menu__share > a");
    const $ul = $a.parent().find("ul");

    if($ul.hasClass("fullpage__menu__share--open")) {
      $a.find("i").removeClass("ion-close-round");
      $ul.removeClass("fullpage__menu__share--open");
    } else {
      $a.find("i").addClass("ion-close-round");
      $ul.addClass("fullpage__menu__share--open");
    }
  }

  $(".fullpage__menu__share > a").on("click", toggleMenuShare);
}

export default menu;
