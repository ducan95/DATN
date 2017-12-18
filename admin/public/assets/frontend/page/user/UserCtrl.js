/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
  .controller('UserCtrl', function ($scope, UserService, $rootScope) {
  //Get list users
  UserService.find({}, function (res) {
    if (typeof res != "undefined") {  
      //$scope.users = res.data;
      $rootScope.users = res.data;
    }
  })
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

  $scope.deleteUser = function (user) { 
  if (popupService.showPopup('Really delete this?')) {
    user.$delete(function () {
       //redirect to home
    });
  }
  };
})

// Edit user
.controller('UserUpdateCtrl', function ($scope, UserUpdateService, $window) {
  $scope.updateUser = function () { 
    $scope.user.$update(function () {
      $window.location.href = '/admincp/user'; //redirect to home
    });
  };

  //$scope.loadUser = function () { 
    //$scope.user = User.get({ id: $stateParams.id });
  //};

  //$scope.loadUser(); 
});
