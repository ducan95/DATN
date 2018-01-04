/**
 * Created by Huynh on 20/12/2017.
 */


  SOUGOU_ZYANARU_MODULE.controller('ImageCtrl',function($scope, trans, toastr, Service, $window, popupService)
  { 
    $scope.location = APP_CONFIGURATION.BASE_URL;
    $scope.currentPage = 1;
    $scope.lastPage = 0;
    $scope.totalPages = 0;
    // find image id
    Service.get({ id: $scope.id }, function(res) {
      if(typeof res != "undefined") {
        if(res.is_success) {
          $scope.image = res.data; 
          console.log($scope.image);
        }     
      }
    }); 
    //find image of parameter
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

    $scope.getImages = function(pageNumber) { 
      if (pageNumber === undefined) {
          pageNumber = '1';
      }
      Service.get({page:pageNumber},function(res) {
        if(res.data != undefined) {
          //console.log(res.data); 
          $scope.images  = res.data.data;
          $scope.total  = res.data.total;
          $scope.currentPage  = res.data.current_page;
          $scope.lastPage  = res.data.last_page;
          $scope.totalPages = [];
          for($i = 1; $i <= $scope.lastPage; $i++) {
            $scope.totalPages.push($i);  
          }
          $scope.prePage = ($scope.currentPage == 1) ? 1 : $scope.currentPage-1;
          $scope.nextPage = ($scope.currentPage == $scope.lastPage) ? $scope.currentPage : $scope.currentPage+1;
        }
        
      });  
    };
   
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
    };

    // update name image 
    $scope.updateImage = function (id) {
      Service.update({
        id   :  id   ,
        name : 'cover'
      }, function (res){
        if(typeof res != "undefined") {
          if(res.is_success) {
            toastr.success('success !');
          } else { 
            toastr.error(res.errors, 'ERROR !!!');
          }    
        }
      });
    }
  });


SOUGOU_ZYANARU_MODULE.controller('ImageAdd', ['$scope', 'uploadImage', 'toastr', function ($scope, uploadImage, toastr) {
    $scope.name = "media";
    $scope.pathImages = [];

    $scope.$watch('files',function (files) {
      $scope.uploadImages(files);
    });

    $scope.upload = function(file) {
      $scope.uploadImages(file);
    }

    $scope.uploadImages = function (files) {
      if(files != undefined) {
        uploadImage.upload(files, $scope.name).then(function(resp){
          toastr.success('success !!!' + resp.data.data.name);
          $scope.pathImages.push(resp.data.data.path);
        }, function(resp){
          toastr.errors('errors !!!');
        });   
      }
    } 


}]);


