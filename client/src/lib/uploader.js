export const openMediaUploader = () => {
  const media_uploader = wp.media({
    frame: 'post',
    state: 'insert',
    multiple: false,
  });

  const promise = new Promise((resolve) => {
    media_uploader.on('insert', () => {
      const json = media_uploader.state().get('selection').first().toJSON();
      return resolve(json);
    });
  });

  media_uploader.open();

  return promise;
};

export const section = () => {
  $('.uploader').on('click', (e) => {
    openMediaUploader().then(res => $(e.currentTarget).val(res.url));
  });
};

