import cookies from './cookies';
import fetchwp from './fetch_wp';

export const runEvents = () => {
  const events = [
    'ga_event',
    'ga_ecm_event',
    'fb_event',
    'cl_event',
  ];

  events.forEach((eventName) => {
    const dataStr = localStorage && localStorage.getItem(eventName);

    if (dataStr !== null) {
      const data = JSON.parse(dataStr);
      fetchwp('store_event', { title: eventName, data })
      .then(() => runEvent(eventName, data))
      .then(() => flushEvent(eventName));
    }
  });
};

export const storeEvent = (name, options = {}) => {
  const p = new Promise((resolve) => {
    localStorage && localStorage.setItem(name, JSON.stringify(options));
    return resolve({ name, options });
  });

  return p;
};

export const eventGoogleEcommerce = ({ customerId, revenue }) => {
  const p = new Promise((resolve) => {
    if (typeof ga === 'function') {
      ga('ecommerce:addTransaction', {
        revenue,
        id: customerId,
        currency: 'USD',
      });

      ga('ecommerce:send');

      return resolve();
    }
  });

  return p;
};

export const eventGoogleAnalytics = (data) => {
  const { category, action, label, value = 0 } = data;

  const p = new Promise((resolve) => {
    typeof window.ga === 'function'
      ? window.ga('send', 'event', category, action, label, value, {
        hitCallback: () => resolve(),
      })
      : console.log('ga error');
  });

  return p;
};

export const eventFacebook = ({ eventName = 'Lead', content = {} }) => {
  const p = new Promise((resolve) => {
    typeof fbq === 'function'
      ? fbq('track', eventName, content)
      : console.log('fb error');

    return resolve();
  });

  return p;
};

export const eventConvertloop = ({ name, person = {}, metadata = {} }) => {
  const data = { name, country: person.country, person: { ...person, pid: cookies.dp_pid }, metadata };
  const p = fetchwp('store_event', { title: 'cl_event', content: data })
    .then(() => fetchwp('convertloop_event', data));
  return p;
};

export const eventConvertloopAsync = ({ name, person = {}, metadata = {} }) => {
  const personWithPid = { ...person, pid: cookies.dp_pid };
  const data = { name, metadata, person: personWithPid };

  const p = fetchwp('store_event', { title: 'cl_event', content: data })
    .then(() => fetchwp('convertloop_event', data));

  return p;
};

export const eventTagManager = () => {

  const p = new Promise((resolve) => {
    window.dataLayer = window.dataLayer || [];
    'dataLayer' in window
    ? window.dataLayer.push({'event': 'lead'})
    : console.log('dataLayer not installed ');
    console.log(JSON.stringify(dataLayer));
    return resolve();
  });

  return p;

}

const runEvent = (eventName, data) => {
  switch (eventName) {
    case 'ga_event':
      return eventGoogleAnalytics(data);
      break;
    case 'ga_ecm_event':
      return eventGoogleEcommerce(data);
      break;
    case 'fb_event':
      return eventFacebook(data);
      break;
    case 'cl_event':
      return eventConvertloop(data);
      break;
    default:
      return Promise.resolve();
  }
};

export const flushEvent = (name) => {
  localStorage && localStorage.removeItem(name);
};
