/**
 * Created by rikkei on 15/12/2017.
 */
var SOUGOU_ZYANARU_MODULE = angular.module("sougou_zyanaru", ['ngResource', 'ngFileUpload', 'toastr', 'bw.paging']);


SOUGOU_ZYANARU_MODULE.factory('HttpInterceptor', function ($rootScope, $q) {
  var requestCount = 0;
  return {
    request: function (config) {
      var opts = config._opts;
      requestCount++;
      if (!opts || opts.loading !== false) {
        $("#spinner_sougouzyanaru").addClass('show-spinner');
      }
      return config || $q.when(config);
    },
    response: function (response) {
      requestCount--;
      if (requestCount == 0) {
        setTimeout(function () {
          $("#spinner_sougouzyanaru").removeClass('show-spinner');
        },200);
      }

      return response || $q.when(response);
    },
    responseError: function (response) {
      requestCount--;
      if (requestCount == 0) {
        setTimeout(function () {
          $("#spinner_sougouzyanaru").removeClass('show-spinner');
        },200);
      }
      return $q.reject(response);
    }
  };
});


SOUGOU_ZYANARU_MODULE.config(['$httpProvider', function ($httpProvider) {
  $httpProvider.interceptors.push('HttpInterceptor');
}]);

// validate.
SOUGOU_ZYANARU_MODULE.service('trans',function(){
    this.messageDelete = "該当の画像の削除を行います。よろしいですか?";
});