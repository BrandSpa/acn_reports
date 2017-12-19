import request from 'axios';
import qs from 'qs';
import { eventGoogleAnalytics, eventConvertloopAsync } from './events';

export default () => {
  if ($('.bs-donate a')) {
    $('.bs-donate a').text(window.bs.donate);
  }

  if ($('.bs-donate')) {
    $('.bs-donate').on('click', async function onClickDonate(e) {
      e.preventDefault();
      const $el = $(this);
      const data = qs.stringify({ action: 'donate_redirect_2' });
      try {
        await eventGoogleAnalytics({ category: 'CLICK', action: 'DONATE', label: 'CLICKDONATE_EN' });
        await eventConvertloopAsync({ name: 'Donate Click' });

        if ($el.attr('href') && $el.attr('href') !== '#' && $el.attr('href') !== '') {
          return window.location = $el.attr('href');
        }

        const res = await request.post('/wp-admin/admin-ajax.php', data);

        if (res.data !== false) return window.location = res.data;

        return window.location = $el.attr('href');
      } catch (err) {
        console.log('donate redirect err: ', err);
      }
    });
  }
};
