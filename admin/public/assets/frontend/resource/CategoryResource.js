
SOUGOU_ZYANARU_MODULE
.factory('CategoryService',function($resource){
	var data = $resource('/web_api/category/list/', { category: '@category' }, {
    list:{
      url: '/web_api/category/list',
      method: 'GET',
      isArray: false
    }
	});
	return data;

})

.factory('CategoryChildrenService',function($resource){
	var data= $resource('web_api/category/find/:id', { category:'@category'},{
	find:{
		url: '/web_api/category/find/:id',
		method: 'GET',
		isArray:false
	}
	})
	return data;
})

.factory('CategoryAddService', function ($resource) {
  return $resource('/web_api/category/add/', { id: '@_id' }, {
    update: {
    	method: 'POST'
    }
  });
})	