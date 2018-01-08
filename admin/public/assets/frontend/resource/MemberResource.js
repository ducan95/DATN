/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
// Api list member
.factory('MemberService', function ($resource) {
  return $resource('/web_api/member/:id', { id: '@id' }, {
    find: {
      url: '/web_api/member/',
      method: 'GET',
      isArray: false
    },
    update: {
      method: 'PUT'
    },
    //dafault is true
    /*stripTrailingSlashes: true*/
  });
})

/*.factory('MemberAddService', function ($resource) {
  return $resource('/web_api/member/add/:id', { id: '@_id' }, {
    update: {
      method: 'POST'
    }
  });
})*/

.service('popupService',function($window){
    this.showPopup=function(message){
      return $window.confirm(message);
    }
});


