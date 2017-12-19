
SOUGOU_ZYANARU_MODULE
	.controller('CategoryCtrl',function($scope,CategoryService){
	CategoryService.list({}, function (res) {
    if (typeof res != "undefined") {  
      //$scope.users = res.data;
      $scope.categories = res.data;
    }
  	})
  })

	.controller('CategoryAddtrl', function ($scope, CategoryAddService) {
  $scope.category = new CategoryAddService();  //create new user instance. Properties will be set via ng-model on UI

  $scope.addCategory = function () { //create a new user. Issues a POST to /api/users
    $scope.category.$save(function () {
      // $window.location.href = '/admincp/category';
      console.log($scope.category);
    });
  };
})