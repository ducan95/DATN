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
          console.log(user);
          user.$delete(function () {
            console.log('Deleting user with id ' + id_user);
          });
        }
      });
    }

    /*
    var user = UserService.get({ id: id_user });
    users.$delete({ id: id_user }, user);
    */
  }  
/* 
    var user = UserService.get({ id: 25 }, function () {
      user.$delete(function () {
        console.log('Deleting user with id 3');
      });
    }); */
})

//Create New User
.controller('UserAddCtrl', function ($scope, UserService, $window) {
  $scope.user = new UserService(); 

  $scope.addUser = function () { 
    //Validate for form
    /* var constraints = {
      email: {
        presence: true,
        email: true
      },
      password: {
        // presence: true,
        length: {
          minimum: 5
        }
      },
      username: {
        presence: true,
        length: {
          minimum: 3,
        },
      },
    };

    var form = document.querySelector("form#main");
    $scope.error = validate(form, constraints) || {};
    console.log($scope.error); */

    $scope.user.$save(function () {
      $window.location.href = APP_CONFIGURATION.BASE_URL +'/admin/user';
    });
  };
})

// Edit user
  .controller('UserUpdateCtrl', function ($scope, UserService, $window) {
    $scope.user = {
      mail: "",
      is_deleted: false,
      status: false,
      username: "",
      password: "",
    };

    var url        = new URL(window.location.href); 
    var id         = url.hash.match(/\d/g);
    $scope.id      = id.join('');
    console.log($scope.id );

  $scope.updateUser = function (user) { 
    //Validate for form
    var constraints = {
      email: {
        presence: true,
        email: true
      },
      password: {
        // presence: true,
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

    // Update user
    UserService.update({ 
      id: 20,
      username: 'Quiền Quiền', 
      email: 'luqu0501@gmail.com', 
      password: 'Kxkx113@', 
      id_role: 1, 
      status: true, 
      is_deleted: false 
    }, {});

    //Let's first get the user and then update it.
    /* var update = UserService.get({ id: $scope.id }, function () {
      update.$update(function () {
        console.log('Success!');
      });
    }); */

  };

  // Show user 
  $scope.loadUser = function () { 
    UserService.get({ id: $scope.id },function(res) {
      $scope.user = res.data;
    });
  };

  $scope.loadUser(); 
});
