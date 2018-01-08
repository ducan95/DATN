SOUGOU_ZYANARU_MODULE.factory('PostService', function ($resource) {
  return $resource('/web_api/post/:id', { id:'@id' }, {
    find: {
      url: '/web_api/post/',
      method: 'GET',
      isArray: false
    },
    update: {
      method: 'PUT'
    }
  });
})
