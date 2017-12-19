export default function toggleMenu() {
  if (window.innerWidth < 701) {
    if ($('.grant-menu__list').length > 0) $('.grant-menu__list').removeClass('dropdown-list--show');
  }

  $('.grant-menu__open').on('click', (e) => {
    e.preventDefault();
    const $list = $('.grant-menu__list');

    if ($list.hasClass('dropdown-list--show')) {
      $list.removeClass('dropdown-list--show');
    } else {
      $list.addClass('dropdown-list--show');
    }
  });

  $('.dropdown-trigger').on('click', function handleDropdown(e) {
    e.preventDefault();
    const $list = $(this).parent().find('.dropdown-list');
    if ($list.hasClass('dropdown-list--show')) {
      $list.removeClass('dropdown-list--show');
    } else {
      $list.addClass('dropdown-list--show');
    }
  });
}
