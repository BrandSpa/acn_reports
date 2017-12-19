import Hammer from 'hammerjs';

const setMenuMobile = function () {
  const $menu = $('.menu--mobile');
  const currentLang = $('.menu--mobile .current-lang > a');
  $('.menu--mobile .current-lang').addClass('dropdown');
  $('.menu--mobile .current-lang').append('<ul class="menu--mobile__langs"></ul>');

  const langs = $('.menu--mobile .lang-item').not($('.current-lang'));
  const $dropdown = $menu.find('.menu--mobile__langs');

  langs.each(function () {
    $dropdown.append($(this).html());
    $(this).remove();
  });

  const newText = `${currentLang.text()}  <i class="ion-chevron-right"></i>`;
  currentLang.html(newText);

  currentLang.on('click', (e) => {
    e.preventDefault();

    if ($dropdown.hasClass('menu--mobile__langs--open')) {
      $(this).find('i').attr('class', 'ion-chevron-right');
      $dropdown.removeClass('menu--mobile__langs--open');
    } else {
      $(this).find('i').attr('class', 'ion-chevron-down');
      $dropdown.addClass('menu--mobile__langs--open');
    }
  });

  const $mainLinks = $('.menu--mobile .menu-item-has-children > a');

  $mainLinks.each(function () {
    const itemWithIcon = `${$(this).text()}  <i class="ion-chevron-right"></i>`;
    $(this).html(itemWithIcon);
  });

  $mainLinks.on('click', function (e) {
    e.preventDefault();

    const $submenu = $(this).parent().find('.sub-menu');


    if ($submenu.hasClass('sub-menu--open')) {
      $(this).find('i').attr('class', 'ion-chevron-right');
      $submenu.removeClass('sub-menu--open');
    } else {
      $('.menu--mobile .menu-item-has-children > a').find('i').attr('class', 'ion-chevron-right');
      $('.menu--mobile .menu-item-has-children .sub-menu').removeClass('sub-menu--open');
      $(this).find('i').attr('class', 'ion-chevron-down');
      $submenu.addClass('sub-menu--open');
    }
  });

  function openMenuMobile() {
    $(document.body).addClass('menu-open');
    $('.menu--mobile').addClass('menu--mobile--open');
    $('.menu--mobile__overlay').addClass('menu--mobile__overlay--open');
  }

  function closeMenuMobile() {
    $(document.body).removeClass('menu-open');
    $('.menu--mobile').removeClass('menu--mobile--open');
    $('.menu--mobile__overlay').removeClass('menu--mobile__overlay--open');
  }

  $('.open-menu').on('click', (e) => {
    e.stopPropagation();
    openMenuMobile();
  });

  $('.close-menu').on('click', (e) => {
    e.stopPropagation();
    closeMenuMobile();
  });

  $(document).on('click', (e) => {
    if ($.contains($menu.get(0), e.target) || $menu.get(0) === e.target) {

    } else {
      closeMenuMobile();
    }
  });

  const stage = document.body;
  const mc = new Hammer.Manager(stage);
  const Swipe = new Hammer.Swipe({ direction: Hammer.DIRECTION_HORIZONTAL });
  mc.add(Swipe);

  mc.on('swipeleft', (e) => {
    openMenuMobile();
  });

  mc.on('swiperight', (e) => {
    closeMenuMobile();
  });
};

export default setMenuMobile;
