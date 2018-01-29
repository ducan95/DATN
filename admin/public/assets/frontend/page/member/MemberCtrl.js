/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE
/**
 * Show and delete User
 * */
.controller('MemberCtrl',['$scope','MemberService', '$window', 'popupService','tranDate','SweetAlert' ,function ($scope, MemberService, $window, popupService,tranDate, SweetAlert) {

  $scope.location = APP_CONFIGURATION.BASE_URL;
  $scope.currentPage = 1;
  $scope.lastPage = 0;
  $scope.totalPages = 0;
  //Get list users
  /*MemberService.find({}, function (res) {
    if (typeof res != "undefined") {  
      $scope.members = res.data;
    }
  })*/

  //delete member --> chuyển từ active sang deactive
  /*$scope.activeMember = function (id_member) {

    if (popupService.showPopup('Are you sure?')) {
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
  }  */

  $scope.activeMember = function (id_member) {
    var options = {
      title: '本当ですか？',
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
    });
  }  

  //show + paginate
  $scope.getMembers = function(pageNumber) { 
    if (pageNumber === undefined) {
        pageNumber = '1';
    }
    MemberService.get({page:pageNumber},function(res) {
      if(res.data != undefined) {
        $scope.members       = res.data.data;
        console.log($scope.members);
        angular.forEach($scope.members,function(value){
          value.birthday = tranDate.tranDate(value.birthday);
        });
        $scope.total        = res.data.total;
        $scope.currentPage  = res.data.current_page;
        $scope.lastPage     = res.data.last_page;
        $scope.totalPages   = [];
        for($i = 1; $i <= $scope.lastPage; $i++) {
          $scope.totalPages.push($i);  
        }
        $scope.prePage  = ($scope.currentPage == 1) ? 1 : $scope.currentPage-1;
        $scope.nextPage = ($scope.currentPage == $scope.lastPage) ? $scope.currentPage : $scope.currentPage + 1;
      }
      
    });  
  };

  //Redirect edit page
  $scope.redirectEdit = function (id_member) { 
    $window.location.href = '/admin/member/edit#id='+id_member;
    $scope.id_member = id_member;
  }

}])


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
    var date = $scope.member.birthday.getFullYear()+"-"+($scope.member.birthday.getMonth()+1)+"-"+$scope.member.birthday.getDate()+" 00:00:00";
    if ($scope.error == undefined) {
      $scope.member.birthday = date;
      console.log($scope.member);
      $scope.member.$save(function () {
      console.log($scope.member);
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
        //presence: true,
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
    //Edit member
    var date= $scope.member.birthday.getFullYear()+"-"+($scope.member.birthday.getMonth()+1)+"-"+$scope.member.birthday.getDate()+" 00:00:00";

    if ($scope.error == undefined) {
      //Get value from ng-model
      var getEMail    = member.email;
      var getPassword = member.password;
      var getBirthday = date;
      var getGender   = member.gender
  
      MemberService.update({
        id        : $scope.id,
        email     : getEMail,
        password  : getPassword,
        birthday  : getBirthday,
        gender    : getGender,
        member_plan_code: 'free',
        is_receive_email: false,
        is_deleted: false,
        is_active : true,
      }, function (){
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/member';
      });
    }
  };

  // Show member 
  $scope.loadMember = function () { 
    MemberService.get({ id: $scope.id },function(res) {
      $scope.member = res.data;
      $scope.member.birthday = new Date($scope.member.birthday);
    });
  };
  $scope.loadMember();
})
