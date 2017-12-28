/**
 * Created by Quyen Luu on 27/12/2017.
 */

SOUGOU_ZYANARU_MODULE
.factory('ReleaseService', function ($resource) {
  return $resource('/web_api/release/:id', { id: '@id' }, {
    find: {
      url: '/web_api/release/',
      method: 'GET',
      isArray: false
    },
    update: {
      method: 'PUT'
    }
  });
})



