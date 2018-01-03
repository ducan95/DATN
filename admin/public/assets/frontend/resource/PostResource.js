SOUGOU_ZYANARU_MODULE
.factory('PostService', function ($resource) {
  return $resource('/web_api/post/:id', { id: '@id' }, {
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
    update:{
      method:"PUT"
    }
  });
})

.service('popupService',function($window){
    this.showPopup=function(message){
      return $window.confirm(message);
    }
});