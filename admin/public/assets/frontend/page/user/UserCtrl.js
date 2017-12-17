/**
 * Created by rikkei on 15/12/2017.
 */

SOUGOU_ZYANARU_MODULE.controller('UserCtrl', function($scope, $http, UserService) {
  // $scope.users = [];

  UserService.find({}, function (res) {
    console.log(res)
    var data_return = []; 
    if (typeof res != "undefined"){
      if (typeof res.data != "undefined"){
        if (typeof res.data.data != "undefined") {
          data_return = res.data.data;
        }
      }
    }
    $scope.users = data_return;
    //console.log($scope.users)
    // Với cái data như vậy thì user.name  lấy kiểu sao anh de anh xem à :)))

  })
  //console.log();

  /* $scope.employees = [
    { 'Name': 'Satinder Singh', 'Gender': 'Male', 'City': 'Bombay' },
    { 'Name': 'Leslie Mac', 'Gender': 'Female', 'City': 'Queensland' },
    { 'Name': 'Andrea ely ', 'Gender': 'Female', 'City': 'Rio' },
    { 'Name': 'Amit Sarna', 'Gender': 'Male', 'City': 'Navi Mumbai' },
    { 'Name': 'David Miller', 'Gender': 'Male', 'City': 'Scouthe' }
  ]; */
  
});
