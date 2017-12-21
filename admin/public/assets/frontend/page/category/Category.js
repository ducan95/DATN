
SOUGOU_ZYANARU_MODULE
	.controller('CategoryCtrl',function($scope,CategoryService,CategoryChildrenService,$window){

	CategoryService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.categories = res.data;
    }
  })

  //Show category children
  $scope.categoryChildren=new CategoryChildrenService();
  $scope.changeToCategoryChil=function(id_category){
		$scope.categoryChildren.$find({id: id_category},function (res){
		if (typeof res != "undefined") {  
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
	.controller('CategoryAddCtrl', function ($scope, CategoryAddService,$window) {
  $scope.category = new CategoryAddService();  
  $scope.addCategory = function () { 
    $scope.category.$save(function () {
      $window.location.href = APP_CONFIGURATION.BASE_URL +'/admin/category';
    });
  };
})

  //Add Category Children
  .controller('CategoryChildrenAddCtrl',function($scope,CategoryChildrenAddService,CategoryService){

    var url        = new URL(window.location.href); 
    var id         = url.hash.match(/\d/g);
    $scope.id      = id.join('');
    //???Làm cách nào list ra category parent với id chỗ url khi mình , em chi can lay params ra thoi roi 
    $scope.categorychil=new CategoryChildrenAddService();
    $scope.addCategoryChil=function(){
      $scope.categorychil.$save(function(){
        // $window.location.href = APP_CONFIGURATION.BASE_URL +'/admin/category';
        console.log($scope.categorychil);
      })
    }


    $scope.loadCategory = function () { 
    CategoryService.get({ id: $scope.id },function(res) {
      $scope.category = res.data[0];
      console.log($scope.category)
    });
  };

  $scope.loadCategory(); 
  })




