SOUGOU_ZYANARU_MODULE.factory('PostcategoryService', function ($resource) {
  return $resource('/web_api/postcategory/:id', { id:'@id' }, {
    update: {
      method: 'PUT'
    }
  });
})
