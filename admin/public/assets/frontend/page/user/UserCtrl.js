/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
/**
 * Show and delete User
 * */
  .controller('UserCtrl', function ($scope, UserService, $window, popupService, RoleService) {
  //Get list users
  UserService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.users = res.data;
    }
  })

    RoleService.find({}, function (res) {
    if (typeof res != "undefined") {
      $scope.roles = res.data;
    }
  })

  //Redirect edit page
  $scope.redirectEdit = function (id_user) { 
    $window.location.href = '/admin/user/edit#id='+id_user;
    $scope.id_user = id_user;
  }

  // Delete users
  $scope.deleteUser = function (id_user) {
    if (popupService.showPopup('本当に削除する')) {
      var user = UserService.get({ id: id_user }, function (res) {
        if (typeof res != "undefined") {
          var user = res.data;
          // Check delete admin
          if (user.role_code == 's_admin') {
            alert('削除できません。');
          } else {
            UserService.delete({ id: user.id_user }, function () {
              console.log('Deleting user with id ' + id_user);
              //Ridirect
              $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/user';
            });
          }
        }
      });
    }
  }  
})

/**
 * Creat new user
 * */
  .controller('UserAddCtrl', function ($scope, UserService, $window, RoleService) {
  $scope.user = new UserService();
  
  //Get role -> showview
  RoleService.find({}, function (res) {
    if (typeof res != "undefined") {
      //console.log(res.data);
      $scope.roles = res.data;
      $scope.roles.splice(0, 1);

    }
  });  
  
  $scope.addUser = function () { 

      //Validate form
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
        role_code: {
          presence: true
        },
        username: {
          presence: true,
          length: {
            minimum: 3,
          },
          format: {
            pattern: "^[-a-zA-Z0-9\u4E00-\u9FA5\u3040-\u309F\u30A0-\u30FF _.]*$",
            // but we don't care if the username is uppercase or lowercase
            flags: "i",
            message: "無効"
          }
        },
      };
      var form = document.querySelector("form#main");
      validate.validators.presence.message = '空白のところで入力してください。';
      validate.validators.email.message = 'メールアドレスの入力を行ってください';
      $scope.error = validate(form, constraints);
      // console.log($scope.error);

      // Check success
      if ($scope.error == undefined) {
        $scope.user.$save(function () {
          // Redirect
          $window.location.href = APP_CONFIGURATION.BASE_URL +'/admin/user';
        });
      }
  };
})

/**
 * Edit user
 * */
  .controller('UserUpdateCtrl', function ($scope, UserService, $window, RoleService) {

  //Get id from url
  var url        = new URL(window.location.href); 
  var id         = url.hash.match(/\d/g);
  $scope.id      = id.join('');

  

  $scope.updateUser = function (user) { 
    //Validate form
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
      role_code: {
        presence: true
      },
      username: {
        presence: true,
        length: {
          minimum: 3,
        },
        format: {
          pattern: "^[-a-zA-Z0-9\u4E00-\u9FA5\u3040-\u309F\u30A0-\u30FF _.]*$",
          // but we don't care if the username is uppercase or lowercase
          flags: "i",
          message: "無効"
        }
      },
    };
    var form = document.querySelector("form#main");
    validate.validators.presence.message = '空白のところで入力してください。';
    validate.validators.email.message = 'メールアドレスの入力を行ってください';
    $scope.error = validate(form, constraints);

    // If clean data -> Edit
    if ($scope.error == undefined) {
      //Get value from ng-model
      var getUsername = user.username;
      var getEmail    = user.email;
      var getPassword = user.password;
      var getRole     = user.role_code;

      // Update user
      UserService.update({
        id:         $scope.id,
        username:   getUsername,
        email:      getEmail,
        password:   getPassword,
        role_code:    getRole,
        status:     true,
        is_deleted: false
      }, function (){
        // Redirect
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/user';
      });
    }
  };

  // Show user 
  $scope.loadUser = function () { 
    UserService.get({ id: $scope.id },function(res) {
      $scope.user = res.data;
    });
    //Get role -> showview
    RoleService.find({}, function (res) {
      if (typeof res != "undefined") {
        $scope.roles = res.data;
        /* if ($scope.roles['role_code'] != 's_admin') {
          $scope.roles.splice(0, 1);
        } */
      }
    });  
  };

  $scope.loadUser(); 
});
