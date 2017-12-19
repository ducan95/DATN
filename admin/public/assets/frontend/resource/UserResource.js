/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
.factory('UserService', function ($resource) {
  var data = $resource('/web_api/user/:id', { user: '@user' }, {
    find: {
      url: '/web_api/user/',
      method: 'POST',
      isArray: false
    },
    update: {
      method: 'PUT'
    }
  });
  return data;
})
.service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    }
});


