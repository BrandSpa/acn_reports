function stickMenu() {
  const $nav = $('.nav');
  const $stickyMenu = $('.sticky-menu');
  const navTop = $nav.length > 0 ? $nav.offset().top : 0;
  const top = navTop;
  const br = document.querySelector('.sticky-menu__container') ?
    document.querySelector('.sticky-menu__container').getBoundingClientRect() :
    document.querySelector('.grant-right').getBoundingClientRect();
  const h = $('.sticky-menu').innerHeight() + 40;

  if (br.top - 110 < 0 && br.bottom - h > 0) {
    $stickyMenu.css({
      position: 'relative',
      top,
    });
  }
}

export default function stickyMenu() {
  if ($('.sticky-menu').length > 0) {
    window.addEventListener('scroll', stickMenu);
  }
}
