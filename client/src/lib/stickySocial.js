function stickSocial() {
    const $nav = $('.bs-post__header--image');
    const $stickyMenu = $('.bs-post__share');
    const navTop = $nav.length > 0 ? $nav.offset().top : 0;
    const top = navTop;
    const br = document.querySelector('.sticky-menu__container') ?
      document.querySelector('.sticky-menu__container').getBoundingClientRect() :
      document.querySelector('.l-wrap').getBoundingClientRect();
    const h = $('.bs-post__share').innerHeight() + 40;
  
    if (br.top - 110 < 0 && br.bottom - h > 0) {
      $stickyMenu.css({
        position: 'relative',
        top,
      });
    }
  }
  
  export default function stickySocial() {
    if ($('.bs-post__share').length > 0) {
      window.addEventListener('scroll', stickSocial);
    }
  }
  