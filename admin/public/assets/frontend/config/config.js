/**
 * Created by rikkei on 15/12/2017.
 */
var SOUGOU_ZYANARU_MODULE = angular.module("sougou_zyanaru", ['ngResource', 'ngFileUpload', 'toastr', 'bw.paging', 'uiSwitch']);


// SOUGOU_ZYANARU_MODULE.factory('HttpInterceptor', function ($rootScope, $q) {
//   var requestCount = 0;
//   return {
//     request: function (config) {
//       var opts = config._opts;
//       requestCount++;
//       if (!opts || opts.loading !== false) {
//         $("#spinner_sougouzyanaru").addClass('show-spinner');
//       }
//       return config || $q.when(config);
//     },
//     response: function (response) {
//       requestCount--;
//       if (requestCount == 0) {
//         $("#spinner_sougouzyanaru").removeClass('show-spinner');
//       }
//
//       return response || $q.when(response);
//     },
//     responseError: function (response) {
//       requestCount--;
//       if (requestCount == 0) {
//         $("#spinner_sougouzyanaru").removeClass('show-spinner');
//       }
//       return $q.reject(response);
//     }
//   };
// });


SOUGOU_ZYANARU_MODULE.config(['$httpProvider', function ($httpProvider) {
  // $httpProvider.interceptors.push('HttpInterceptor');
}]);


