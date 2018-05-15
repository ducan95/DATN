SOUGOU_ZYANARU_MODULE
  .controller('CommentCtrl', function ($scope, CommentService, $window) {
    CommentService.find({}, function (res) {
        console.log(res);
        if (typeof res != "undefined") {  
            $scope.comments = res.data;
          }
    })
  });