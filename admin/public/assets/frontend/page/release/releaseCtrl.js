/**
 * Created by Quyen Luu - 27/12/2017
 */

SOUGOU_ZYANARU_MODULE
/**
 * Show and delete Release
 * */
  .controller('ReleaseCtrl', function ($scope, ReleaseService) {
  //Get list users
  ReleaseService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.users = res.data;
      console.log(res.data);
    }
  })

})

