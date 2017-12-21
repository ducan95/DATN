
SOUGOU_ZYANARU_MODULE
// Api list category parent
.factory('CategoryService',function($resource){
	return $resource('/web_api/category/:id', { id: '@id' }, {
    find:{
      url: '/web_api/category/',
      method: 'GET',
      isArray: false
    },
  });
})
.factory('CategoryChildrenService',function($resource){
	return $resource('/web_api/category/categorychildren/:id', { id: '@id' }, {
    find:{
      url: '/web_api/category/categorychildren/:id',
      method: 'GET',
      isArray: false
    },
  });
})
.factory('CategoryChildrenAddService',function($resource){
	return $resource('/web_api/category/addchildren/:id', { id: '@_id' },{
		update:{
			method:'POST'
		}
	})
})
.factory('CategoryAddService', function ($resource) {
  return $resource('/web_api/category/add/:id', { id: '@_id' }, {
    update: {
    	method: 'POST'
    }
  });
})
.service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    }
});

// })
// //Take category parent in form add category children
// .factory('CategoryParentService',function($resource){
// 	var data= $resource('web_api/category/listone/:id', { category:'@category'},{
// 	list:{
// 		url: '/web_api/category/listone/:id',
// 		method: 'GET',
// 		isArray:false
// 	}
// 	})
// 	return data;
// })

// //Api list category children when click category parent
// .factory('CategoryChildrenService',function($resource){
// 	var data= $resource('web_api/category/find/:id', { category:'@category'},{
// 	find:{
// 		url: '/web_api/category/find/:id',
// 		method: 'GET',
// 		isArray:false
// 	}
// 	})
// 	return data;
// })
//Api add Category parent
	
// //Api add Category Children
// .factory('CategoryChildrenAddService',function($resource){
// 	return $resource('web_api/category/addChil/',{ id: '@_id'},{
// 		update:{
// 			method:'POST'
// 		}
// 	});
