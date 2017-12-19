/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
.factory('UserService', function ($resource) {
  var data = $resource('/web_api/user/find/:id', { user: '@user' }, {
    find: {
      url: '/web_api/user/find',
      method: 'POST',
      isArray: false
    }
  });
  return data;
})
.factory('UserAddService', function ($resource) {
  return $resource('/web_api/user/:id', { id: '@_id' }, {
    update: {
      method: 'POST'
    }
  });
})
.factory('UserDeleteService', function ($resource) {
  return $resource('/web_api/user/dele/:id', { id: '@_id' }, {
    'delete': { 
      method: 'DELETE' 
    },
  });
})
.factory('UserUpdateService', function ($resource) {
  return $resource('/web_api/user/:id', { id: '@_id' }, {
    'update': {
      method: 'PUT',
      isArray: false,
    },
  });
})
.service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    }
});


