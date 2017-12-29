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
          var user = res.data;
            MemberService.delete({ id: member.id_member });
        }
      });
    }
  }  
})
