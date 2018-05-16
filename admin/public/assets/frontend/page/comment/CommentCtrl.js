SOUGOU_ZYANARU_MODULE
  .controller('CommentCtrl', function ($scope, CommentService,  $window, popupService,toastr,trans) {
    CommentService.find({}, function (res) {
        console.log(res);
        if (typeof res != "undefined") {  
            $scope.comments = res.data;
          }
    })
    $scope.deleteComment = function(id, index) {
      var options = {
        title: 'Xóa bình luận này không?',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Không",
        confirmButtonText: "Có",
        closeOnConfirm: true,
        closeOnCancel: true,
      };
      swal(options, function(isConfirm) {
        if (isConfirm) {
          CommentService.delete({ id: id }, function(res) {
            if(res.is_success) {
              $scope.comments.splice(index, 1);
            } else {
              console.log(res);
            }  
          });
        }
      });
    };
  });