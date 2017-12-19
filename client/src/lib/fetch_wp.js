import request from 'axios';
import qs from 'qs';

export default function fetchwp(action = '', data = {}, endpoint = '/wp-admin/admin-ajax.php') {
  const reqData = qs.stringify({ action, data });
  return request.post(endpoint, reqData);
}
