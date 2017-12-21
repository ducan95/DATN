
SOUGOU_ZYANARU_MODULE
// Api list category parent
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
//Take category parent in form add category children
.factory('CategoryParentService',function($resource){
	var data= $resource('web_api/category/listone/:id', { category:'@category'},{
	list:{
		url: '/web_api/category/listone/:id',
		method: 'GET',
		isArray:false
	}
	})
	return data;
})

//Api list category children when click category parent
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
//Api add Category parent
.factory('CategoryAddService', function ($resource) {
  return $resource('/web_api/category/add/', { id: '@_id' }, {
    update: {
    	method: 'POST'
    }
  });
})	
//Api add Category Children
.factory('CategoryChildrenAddService',function($resource){
	return $resource('web_api/category/addChil/',{ id: '@_id'},{
		update:{
			method:'POST'
		}
	});
})