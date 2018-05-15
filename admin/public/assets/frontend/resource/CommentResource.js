SOUGOU_ZYANARU_MODULE
.factory('CommentService', function ($resource) {
  return $resource('/web_api/comment/:id', { id: '@id' }, {
    find: {
      url: '/web_api/comment/',
      method: 'GET',
      isArray: false
    },
    update: {
      method: 'PUT'
    }
  });
})


