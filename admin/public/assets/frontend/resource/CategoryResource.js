
SOUGOU_ZYANARU_MODULE
// Api list category parent
.factory('CategoryService',function($resource){
	return $resource('/web_api/category/:id', { id: '@id' }, {
    find:{
      url: '/web_api/category/',
      method: 'GET',
      isArray: false
    },
    update:{
		method:'PUT'
	}
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
