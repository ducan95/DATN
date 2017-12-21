/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
.factory('UserService', function ($resource) {
  return $resource('/web_api/user/:id', { id: '@id' }, {
    find: {
      url: '/web_api/user/',
      method: 'GET',
      isArray: false
    },
    update: {
      method: 'PUT'
    }
  });
})
.service('popupService',function($window){
    this.showPopup=function(message){
      return $window.confirm(message);
    }
});


