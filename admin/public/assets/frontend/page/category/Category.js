
SOUGOU_ZYANARU_MODULE
	.controller('CategoryCtrl',function($scope,CategoryService,CategoryChildrenService, $window){

	CategoryService.list({}, function (res) {
    if (typeof res != "undefined") {  
      //$scope.users = res.data;
      $scope.categories = res.data;
    }
  })
  //Show category children
  $scope.categoryChildren=new CategoryChildrenService();
  $scope.changeToCategoryChil=function(id_category){
		$scope.categoryChildren.$find({id: id_category},function (res){
		if (typeof res != "undefined") {  
       //$window.location.href = APP_CONFIGURATION.BASE_URL +'/admincp/category/#id=' + id_category;
      $scope.categoryChildren = res.data;
      $scope.categoryParent=res.data[0];
    	}
	  });
  }
    //Ridirect page Add category children with id_category_parent
  $scope.redirectAddChil = function (id_category_parent) { 
    console.log(id_category_parent);
    //$window.location.href = '/admincp/user/edit/'+id_user;
    $scope.id_category_parent = id_category_parent;
    $window.location.href = '/admin/category/addchildren#id_cat_parent='+id_category_parent;   

  }

})
  //Add Category Parent
	.controller('CategoryAddCtrl', function ($scope, CategoryAddService) {
  $scope.category = new CategoryAddService();  

  $scope.addCategory = function () { 
    $scope.category.$save(function () {
      // $window.location.href = '/admincp/category';
      console.log($scope.category);
    });
  };
})
  //Add Category Children
  .controller('CategoryChildrenAddCtrl',function($scope,CategoryChildrenAddService){
    //???Làm cách nào list ra category parent với id chỗ url khi mình , em chi can lay params ra thoi roi 

    $scope.categorychil=new CategoryChildrenAddService();

    $scope.addCategoryChil=function(){
      $scope.categorychil.$save(function(){
        console.log($scope.categorychil);
      })
    }

    $scope.loadCategory = function () { 
    CategoryParentService.get({ id: $scope.id_category },function(res) {
      $scope.categorychil = res.data;
    });
  };

  $scope.loadCategory(); 
  })


