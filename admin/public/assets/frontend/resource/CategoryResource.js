
SOUGOU_ZYANARU_MODULE
.factory('CategoryService',function($resource){
	var data = $resource('/web_api/category/list/:id', { category: '@category' }, {
    list:{
      url: '/web_api/category/list',
      method: 'GET',
      isArray: false
    }
	});
	return data;
})

.factory('CategoryAddService', function ($resource) {
  return $resource('/web_api/category/:id', { id: '@_id' }, {
    update: {
      method: 'POST'
    }
  });
})	