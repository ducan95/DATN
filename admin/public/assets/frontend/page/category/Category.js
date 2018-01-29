
SOUGOU_ZYANARU_MODULE
	.controller('CategoryCtrl',['$scope', 'CategoryService', 'CategoryChildrenService', 'popupService', '$window','SweetAlert', function($scope,CategoryService,CategoryChildrenService,popupService,$window,SweetAlert){
  CategoryService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.categories = res.data;
      $scope.states={};
      $scope.states.categoryactive=res.data[0];
    }
  })

  //Show category children
  $scope.categoryservice=new CategoryChildrenService();
  $scope.changeToCategoryChil=function(id_category){
		$scope.categoryservice.$find({id: id_category},function (res){
		if (typeof res != "undefined") {  
      $scope.categoryChildren = res.data;
      $scope.categoryParent=res.data[0];
    	}
	  });
  }
   
  //update category parent
  $scope.redirecteditparent=function(id_category_parent){
    $scope.id_category_parent = id_category_parent;
    $window.location.href = '/admin/category/editparent#id_category_parent='+id_category_parent;  
  }

  //update category chil
  $scope.redirecteditchil=function(id_category){
    $scope.id_category=id_category;
    console.log($scope.id_category);
    $window.location.href = '/admin/category/edit#id_cat='+id_category;  
    }

  //delete category chil
  /*$scope.deleteCategoryChil = function (id_category) {
    if (popupService.showPopup('Really delete this?')) {
      var category = CategoryService.get({ id: id_category }, function (res) {
        if (typeof res != "undefined") {
          var category = res.data;
            CategoryService.delete({ id: category[0].id_category},function () {
            console.log('Deleting category chil with id ' + id_category);
            //Ridirect
            $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/category';
          });
        }
      });
    }
  }*/  

  $scope.deleteCategoryChil = function (id_category) {
    var options = {
      title: "削除してもよろしいですか？",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      cancelButtonText: "いいえ",
      confirmButtonText: "はい",
      closeOnConfirm: true,
      closeOnCancel: true,
    };
    swal(options, function(isConfirm) {
      if (isConfirm) {
        var category = CategoryService.get({ id: id_category }, function (res) {
          if (typeof res != "undefined") {
            var category = res.data;
              CategoryService.delete({ id: category[0].id_category},function () {
              console.log('Deleting category chil with id ' + id_category);
              //Ridirect
              $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/category';
            });
          }
        });
      }
    });
  }
  //delete category parent
  /*$scope.deleteCategory=function(id_category){
     if (popupService.showPopup('Really delete this?')) {
      var category = CategoryService.get({ id: id_category }, function (res) {
        if (typeof res != "undefined") {
          var category = res.data;
            CategoryService.delete({ id: category[0].id_category},function () {
            console.log('Deleting category parent with id ' + id_category);
            //Ridirect
            $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/category';
          });
        }
      });
    }
  }*/

  $scope.deleteCategory = function(id_category){
    var options = {
      title: "削除してもよろしいですか？",
      text: "サブカテゴリが削除されます",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      cancelButtonText: "いいえ",
      confirmButtonText: "はい",
      closeOnConfirm: true,
      closeOnCancel: true,
    };
    swal(options, function(isConfirm) {
      if (isConfirm) {
        var category = CategoryService.get({ id: id_category }, function (res) {
          if (typeof res != "undefined") {
            var category = res.data;
              CategoryService.delete({ id: category[0].id_category},function () {
              console.log('Deleting category parent with id ' + id_category);
              //Ridirect
              $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/category';
            });
          }
        });
      }
    });
  }
}])

  //============================================================
  //Add Category Parent
	.controller('CategoryAddCtrl', function ($scope, CategoryAddService,$window) {
  $scope.category = new CategoryAddService();  
  $scope.addCategory = function () { 
    //Validate form
    var constraints = {
      name: {
        presence: true,
      },
      slug: {
        presence: true,
      },
    };
    var form = document.querySelector("form#main");
    validate.validators.presence.message = '空白のところで入力してください。';
    $scope.error = validate(form, constraints);
  
    // Check success
    if ($scope.error == undefined) {
      $scope.category.$save(function () {
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/category';
      });
    }
   
  };
})

  //Add Category Children
  .controller('CategoryChildrenAddCtrl',function($scope,CategoryChildrenAddService,CategoryService,$window){
    $scope.categorychil=new CategoryChildrenAddService();
    $scope.addCategoryChil=function(){
      //console.log($scope.categorychil)
      //Validate form
      var constraints = {
        name: {
          presence: true,
        },
        slug: {
          presence: true,
        },
        parent: {
          presence: true,
        },

      };
      var form = document.querySelector("form#main");
      validate.validators.presence.message = '空白のところで入力してください。';
      $scope.error = validate(form, constraints);
      
      if ($scope.error == undefined) {
        $scope.categorychil.$save(function () {
          $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/category';
        })
      }
     
    }
      CategoryService.find({}, function (res) {
        if (typeof res != "undefined") {  
        $scope.categorytparent = res.data;
        }
    })
})

  .controller('Editcategoryparent',function($scope,CategoryService,$window){
    var url        = new URL(window.location.href); 
    var id         = url.hash.match(/\d/g);
    $scope.id      = id.join('');

    $scope.updateCategory = function (categoryparent) {
    // console.log(categoryparent);

    //var form = document.querySelector("form#editparent");
    // $scope.error = validate(form, constraints) || {};
    // console.log($scope.error);
      //Validate form
      var constraints = {
        name: {
          presence: true,
        },
        slug: {
          presence: true,
        },

      };
      var form = document.querySelector("form#main");
      validate.validators.presence.message = '空白のところで入力してください。';
      $scope.error = validate(form, constraints);

      if ($scope.error == undefined) {
        //Get value from ng-model
        var getname = categoryparent.name;
        var getslug = categoryparent.slug;
        var getglobal_status = categoryparent.global_status;
        var getmenu_status = categoryparent.menu_status;

        // Update category
        CategoryService.update({
          id: $scope.id,
          name: getname,
          slug: getslug,
          global_status: getglobal_status,
          menu_status: getmenu_status,
          is_deleted: false
        },function (){
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/category';
      });
    } 
  };  
     $scope.loadCategory = function () { 
      CategoryService.get({ id: $scope.id },function(res) {
      $scope.categoryparent = res.data[0];
    });
  };
  $scope.loadCategory(); 
})

  .controller('Editcategorychil',function($scope,CategoryService,$window,CategoryChildrenService){
    var url        = new URL(window.location.href); 
    var id         = url.hash.match(/\d/g);
    $scope.id      = id.join('');

    $scope.updateCategoryChil=function(category){

      var constraints = {
        name: {
          presence: true,
        },
        slug: {
          presence: true,
        },

      };
      var form = document.querySelector("form#main");
      validate.validators.presence.message = '空白のところで入力してください。';
      $scope.error = validate(form, constraints);

      if ($scope.error == undefined) {
        var getname = category.name;
        var getslug    = category.slug;
        var getglobal_status = category.global_status;
        var getmenu_status     = category.menu_status;
        var getid_category_parent=category.parent_category;
        
        // Update category
        CategoryChildrenService.update({ 
          id:         $scope.id,
          name:   getname,
          slug:      getslug,
          global_status:   getglobal_status,
          menu_status:    getmenu_status,
          is_deleted: false ,
          id_category_parent: getid_category_parent
      }, function (){
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/category';
      });
    } 
  };  

    CategoryService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.categorytparent = res.data;
      angular.forEach(res.data,function(value){
          $scope.id_category=value.id_category;
          // console.log($scope.id_category);
      })
      }
    })

    $scope.loadCategoryChil=function(){
      CategoryService.get({ id: $scope.id },function(res){
        $scope.category=res.data[0];
      });
    };  
      $scope.loadCategoryChil();

  })
  
      








