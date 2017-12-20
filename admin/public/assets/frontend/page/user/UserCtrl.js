/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
.controller('UserCtrl', function ($scope, UserService, $window, popupService) {
  //Get list users
  UserService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.users = res.data;
    }
  })

  //Redirect edit page
  $scope.redirectEdit = function (id_user) { 
    $window.location.href = APP_CONFIGURATION.BASE_URL +'/admin/user/edit#id=' + id_user;
  }

  // Delete users
  $scope.deleteUser = function (id_user) {
    if (popupService.showPopup('Really delete this?')) {
      var user = UserService.get({ id: id_user }, function (res) {
        if (typeof res != "undefined") {
          var user = res.data;
          UserService.delete({ id: user.id_user},function () {
            console.log('Deleting user with id ' + id_user);
            //Ridirect
            $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/user';
          });
        }
      });
    }
  }  
})

//Create New User
.controller('UserAddCtrl', function ($scope, UserService, $window) {
  $scope.user = new UserService(); 
  $scope.addUser = function () { 
    $scope.user.$save(function () {
      $window.location.href = APP_CONFIGURATION.BASE_URL +'/admin/user';
    });
  };
})

// Edit user
.controller('UserUpdateCtrl', function ($scope, UserService, $window) {

  //Get id from url
  var url        = new URL(window.location.href); 
  var id         = url.hash.match(/\d/g);
  $scope.id      = id.join('');

  $scope.updateUser = function (user) { 
    console.log(user);

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
        },
        format: {
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

    //Get value from ng-model
    var getUsername = user.username;
    var getEmail    = user.email;
    var getPassword = user.password;
    var getRole     = user.id_role;
    
    // Update user
    UserService.update({ 
      id:         $scope.id,
      username:   getUsername,
      email:      getEmail,
      password:   getPassword,
      id_role:    getRole,
      status:     true,
      is_deleted: false 
    }, {});

  };

  // Show user 
  $scope.loadUser = function () { 
    UserService.get({ id: $scope.id },function(res) {
      $scope.user = res.data;
      //console.log($scope.user);
    });
  };

  $scope.loadUser(); 
});
