
SOUGOU_ZYANARU_MODULE
	.controller('CategoryCtrl',function($scope,CategoryService,CategoryChildrenService){
	CategoryService.list({}, function (res) {
    if (typeof res != "undefined") {  
      //$scope.users = res.data;
      $scope.categories = res.data;
    }
  })

  $scope.categoryChildren=new CategoryChildrenService();

	$scope.changeToCategoryChil=function(id_category){
		$scope.categoryChildren.$find({id: id_category},function (res){
		if (typeof res != "undefined") {  
       //$window.location.href = APP_CONFIGURATION.BASE_URL +'/admincp/category/#id=' + id_category;
      $scope.categoryChildren = res.data;
      console.log($scope.categoryChildren);
    	}
	  });
  }
})

	.controller('CategoryAddCtrl', function ($scope, CategoryAddService) {
  $scope.category = new CategoryAddService();  //create new user instance. Properties will be set via ng-model on UI

  $scope.addCategory = function () { //create a new user. Issues a POST to /api/users
    $scope.category.$save(function () {
      // $window.location.href = '/admincp/category';
      console.log($scope.category);
    });
  };
})