/**
 * Created by rikkei on 15/12/2017.
 */


  SOUGOU_ZYANARU_MODULE.controller('ImageCtrl',function($scope, Service, $window, popupService)
  {
    // find image id
    Service.get({ id: $scope.id }, function(res) {
      if(typeof res != "undefined") {
        if(res.is_success) {
          $scope.image = res.data; 
        }     
      }
      
    }); 

    //find iamge of parameter
    $scope.searchImage = function() {
      Service.get({namepost:$scope.parameter}, function(res) {
        if(typeof res != "undefined") {
          if(res.is_success) {
            $scope.images = res.data; 
            console.log(res.data);
          } 
        }
      });   
    }
    
    // get list image
    Service.get(function(res) {
      if(typeof res != "undefined") {
        if(res.is_success) {
          $scope.images = res.data;
          console.log($scope.images) ;
        }     
      }
    }); 
    // create new image
    $scope.imageSave = new Service(); 
    $scope.imageSave.file = 'some data';
    Service.save($scope.imageSave, function(res) {
      if(typeof res != "undefined") {
        if(res.is_success) {
          $scope.images = res.data; console.log(res);
        } else { 
          //console.log(res);
        }    
      }  
    }); 
/*
    $scope.updateImage = function () {
      Service.update({
        id:         20,
      }, function (res){
        console.log(res);
      });
    }*/

    $scope.deleteImage = function(id, index) {
      if(popupService.showPopup()) {
        $scope.images.splice(index, 1);
        Service.delete({ id: id }, function(res) {
          if(!res.is_success) {
            alert(res.errors); 
          }   
        });
      }
     
    }
  });




SOUGOU_ZYANARU_MODULE.controller('ImageAdd', ['$scope', 'Upload', '$timeout', function ($scope, Upload, $timeout) {
    $scope.$watch('files', function () {
        $scope.upload($scope.files);
    });

  /*  $scope.$watch('file', function () {
        if ($scope.file != null) {
            $scope.files = [$scope.file]; 
        }
    });
*/

    $scope.upload = function (files) {
        if (files && files.length) {
            for (var i = 0; i < files.length; i++) { 
              var file = files[i];
              if (!file.$error ) {
                Upload.upload({
                    url: '/web_api/images',
                    data: {
                      username: $scope.username,
                      file: file  
                    }
                }).then(function (resp) {
                    $timeout(function() { 
                        $scope.log = 'file: ' +
                        resp.config.data.file.name +
                        ', Response: ' + JSON.stringify(resp.data) +
                        '\n' + $scope.log;

                    });
                }, null, function (evt) {
                    var progressPercentage = parseInt(100.0 *
                        evt.loaded / evt.total);
                    $scope.log = 'progress: ' + progressPercentage + 
                      '% ' + evt.config.data.file.name + '\n' + 
                      $scope.log;
                      console.log($scope.log);
                      
                });
              } else {
                console.log(123);
              }
            }
        }
    };
}]);