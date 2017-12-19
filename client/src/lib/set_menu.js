const setMenu = function setMenu() {
  const $menu = $('.menu');
  const currentLang = $('.menu .current-lang > a');
  $menu.find('.current-lang').addClass('dropdown');
  $menu.find('.current-lang').append('<div class="dropdown-content"></div>');

  const langs = $('.menu .lang-item').not($('.current-lang'));

  langs.each(function () {
    $menu.find('.dropdown-content').append($(this).html());
    $(this).remove();
  });

  $menu.addClass('menu--show');

  currentLang.on('click', (e) => {
    e.preventDefault();
    const $dropdown = $menu.find('.dropdown-content');

    if ($dropdown.hasClass('dropdown-content--show')) {
      $dropdown.removeClass('dropdown-content--show');
    } else {
      $dropdown.addClass('dropdown-content--show');
    }
  });

  const newText = `${currentLang.text()} <i class="ion-chevron-down"></i>`;
  currentLang.html(newText);
};

export default setMenu;
