/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
/**
 * Show and delete User
 * */
  .controller('MemberCtrl', function ($scope, MemberService, $window, popupService) {
  //Get list users
  MemberService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.members = res.data;
    }
  })

  $scope.deleteMember = function (id_member) {
    if (popupService.showPopup('本当に削除する')) {
      var member = MemberService.get({ id: id_member }, function (res) {
        if (typeof res != "undefined") {
          var member = res.data;
          MemberService.delete({ id: member.id_member }, function () {
            console.log('Deleting member with id ' + id_member);
            //Ridirect
            $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/member/';
          });  
        }
      });
    }
  }  

  //Redirect edit page
  $scope.redirectEdit = function (id_member) { 
    $window.location.href = '/admin/member/edit#id='+id_member;
    $scope.id_member = id_member;
  }

})


  //add member
  .controller('MemberAddCtrl',function($scope, MemberService, $window, popupService){  
    $scope.member = new MemberService();
    $scope.addMember = function(){
      //validate
      var constraints = {
        email: {
          presence: true,
          email: true,
        },
        birthday: {
          presence: true,
        },
        password: {
          presence: true,
          length: {
            minimum: 6
          }
        },
        gender: {
          presence: true,
        }

      };
      var form = document.querySelector("form#main");
      validate.validators.presence.message = '空白のところで入力してください。';
      validate.validators.email.message = 'メールアドレスの入力を行ってください';
      $scope.error = validate(form, constraints);
      console.log($scope.error);
     
      if ($scope.error == undefined) {
        $scope.member.$save(function () {
          $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/member/';
        });
      }
    }; 
  })

.controller('MemberUpdateCtrl',function($scope, MemberService, $window, popupService){
  //Get id from url
  var url        = new URL(window.location.href); 
  var id         = url.hash.match(/\d/g);
  $scope.id      = id.join('');

  $scope.updateMember = function(member){
    //validate
    var constraints = {
      email: {
        presence: true,
        email: true,
      },
      birthday: {
        presence: true,
      },
      password: {
        presence: true,
        length: {
          minimum: 6
        }
      },
      gender: {
        presence: true,
      }

    };
    var form = document.querySelector("form#main");
    validate.validators.presence.message = '空白のところで入力してください。';
    validate.validators.email.message = 'メールアドレスの入力を行ってください';
    $scope.error = validate(form, constraints);
    console.log($scope.error);
    //Edit member
    if ($scope.error == undefined) {
      //Get value from ng-model
      var getEMail    = member.email;
      var getPassword = member.password;
      var getBirthday = member.birthday;
      var getGender   = member.gender

      // Update member
      MemberService.update({
        id        : $scope.id,
        email     : getEMail,
        password  : getPassword,
        birthday  : getBirthday,
        gender    : getGender,
        member_plan_code: 'free',
        is_receive_email: false,
        is_deleted: false
      }, function (){
        // Redirect
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/member';
      });
    }
  };

  // Show member 
  $scope.loadMember = function () { 
    MemberService.get({ id: $scope.id },function(res) {
      $scope.member = res.data;
    });
  };
  $scope.loadMember();
})
