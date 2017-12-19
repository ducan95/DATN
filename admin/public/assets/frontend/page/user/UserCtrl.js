/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
  .controller('UserCtrl', function ($scope, UserService, $window) {
  //Get list users
  $scope.id_user = 1;
  UserService.find({}, function (res) {
    if (typeof res != "undefined") {  
      //$scope.users = res.data;
      $scope.users = res.data;
    }
  })
  
  $scope.redirectEdit = function (id_user) { 
    //$window.location.href = '/admincp/user/edit/'+id_user;
    $scope.id_user = id_user;
    console.log($scope.id_user);
    $window.location.href = '/admincp/user/edit';
   
  }

})

//Create New User
.controller('UserAddCtrl', function ($scope, UserAddService, $window) {
  $scope.user = new UserAddService();  //create new user instance. Properties will be set via ng-model on UI

  $scope.addUser = function () { //create a new user. Issues a POST to /api/users
    $scope.user.$save(function () {
      $window.location.href = '/admincp/user';
      
    });
  };
})

// Delete users
  .controller('UserDeleteCtrl', function ($scope, UserDeleteService, $rootScope, popupService) {
  ///????

  $scope.deleteUser = function () { 
  if (popupService.showPopup('Really delete this?')) {
    user.$delete(function () {
       //redirect to home
    });
  }
  };
})

// Edit user
.controller('UserUpdateCtrl', function ($scope, UserUpdateService, $window) {
  console.log($scope.id_user);
  $scope.updateUser = function (id_user) { 
    $scope.user.$update(function (id_user) {
      //$window.location.href = '/admincp/user/edit';
    });
  };

  //$scope.loadUser = function () { 
    //$scope.user = User.get({ id: $stateParams.id });
  //};

  //$scope.loadUser(); 
});
