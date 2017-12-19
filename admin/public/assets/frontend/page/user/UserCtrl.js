/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
  .controller('UserCtrl', function ($scope, UserService, $window) {
  //Get list users
  UserService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.users = res.data;
    }
  })
  //Redirect edit page
  $scope.redirectEdit = function (id_user) { 
    $window.location.href = APP_CONFIGURATION.BASE_URL +'/admincp/user/edit#id=' + id_user;
  }

})

//Create New User
.controller('UserAddCtrl', function ($scope, UserAddService, $window) {
  $scope.user = new UserAddService(); 

  $scope.addUser = function () { 
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
    $scope.user = {
      mail: "",
      is_deleted: false,
      status: false,
      username: "",
      password: "",
    };

    var url = new URL(window.location.href); 
    var id         = url.hash.match(/\d/g);
    $scope.id      = id.join('');

  $scope.updateUser = function (user) { 
    //Validate for form
    var constraints = {
      email: {
        presence: true,
        email: true
      },
      password: {
        presence: true,
        length: {
          minimum: 5
        }
      },
      username: {
        presence: true,
        length: {
          minimum: 3,
          maximum: 20
        },
        format: {
          // We don't allow anything that a-z and 0-9
          pattern: "[a-z0-9]+",
          // but we don't care if the username is uppercase or lowercase
          flags: "i",
          message: "can only contain a-z and 0-9"
        }
      },
    };

    var form = document.querySelector("form#main");
    $scope.error = validate(form, constraints) || {};
    console.log($scope.error);

    //Gửi lên được là sẽ update được

    /* user.$update(function () {
      $window.location.href = '/admincp/user';
    }); */

    //Let's first get the user and then update it.
    var update = UserUpdateService.get({ id: $scope.id }, function () {
      //user.address = "MARS";
      update.$update(function () {
        console.log('Đã up được');
      });
    });

  };

  // Show user 
  $scope.loadUser = function () { 
    UserUpdateService.get({ id: $scope.id },function(res) {
      $scope.user = res.data;
    });
  };

  $scope.loadUser(); 
});
