/**
 * Created by Huynh on 20/12/2017.
 */


  SOUGOU_ZYANARU_MODULE.controller('ImageCtrl',function($scope, trans, Service, $window, popupService)
  { 
    $scope.location = APP_CONFIGURATION.BASE_URL;
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
      Service.get({name:$scope.parameter}, function(res) {
        if(typeof res != "undefined") {
          if(res.is_success ){
            $scope.images = res.data; 
          } else {
            console.log(res);
          }
        }
      });   
    }
    // get list image
    Service.get(function(res) {
      if(typeof res != "undefined") {
        if(res.is_success) {
          $scope.images = res.data;
        }  else {
          console.log($scope.images) ;
        }   
      }
    }); 

    $scope.deleteImage = function(id, index) {
      if(popupService.showPopup(trans.messageDelete)) {
        Service.delete({ id: id }, function(res) {
          if(res.is_success) {
            $scope.images.splice(index, 1);
          } else {
            console.log(res);
          }  
        });
      }
    }
    // create new image
    /*$scope.imageSave = new Service(); 
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
    */
    $scope.updateImage = function (id) {
      Service.update({
        id   :  id   ,
        name : "zxczxcxzcxz"
      }, function (res){
        console.log(res);
      });
    }
  });


SOUGOU_ZYANARU_MODULE.controller('ImageAdd', ['$scope', 'Upload', '$timeout','toastr', function ($scope, Upload, $timeout, toastr) {
    $scope.$watch('files', function () {
        $scope.upload($scope.files);
    });
    $scope.log = '';
    
    $scope.upload = function (files) {
        if (files && files.length) {
            for (var i = 0; i < files.length; i++) {
              var file = files[i];
              if (!file.$error) {
                Upload.upload({
                    url: '/web_api/images',
                    data: {
                      username: $scope.username,
                      file: file  
                    }
                }).then(function (resp) {
                  toastr.success('Success ' + resp.config.data.file.name );     
                }, function (evt) {
                    // Show all progress upload image
                    var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                    console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
                });
              }
            }
        }
    };
}]);