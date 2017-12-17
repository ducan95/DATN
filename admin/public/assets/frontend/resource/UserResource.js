/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE.factory('UserService', function ($resource) {
  var data = $resource('/web_api/user/:id', { user: '@user' }, {
    find: {
      url: '/web_api/user',
      method: 'GET',
      isArray: false
    }
  });
  return data;
});