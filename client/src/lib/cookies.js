
const getCookies = () => {
  const cookies = {};

  document.cookie.split(';').forEach((l) => {
    cookies[l.split('=')[0].trim()] = l.split('=')[1];
  });

  return cookies;
};

export default getCookies();
