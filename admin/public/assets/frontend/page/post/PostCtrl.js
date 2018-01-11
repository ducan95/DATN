

/**
 * Show and delete User
 * */

SOUGOU_ZYANARU_MODULE.controller('PostCtrl',
['$scope', 'PostService', 'CategoryService', 'ImageService', 'CategoryChildrenService', 
'uploadImage', '$q', '$window', 'toastr', 'tranDate', 'ReleaseService',
function($scope, PostService, CategoryService, ImageService, CategoryChildrenService, 
uploadImage, $q, $window, toastr, tranDate, ReleaseService){

  $scope.dateStart = tranDate.tranDate('2017-11-30');
  /**
  ** function get list posts
  ** service PostService 
  ** api:  web_api/post/
  ** param pageNumber
  ** return response API 
  **/
  $scope.getPosts = function(pageNumber) { 
    if (pageNumber === undefined) {
        pageNumber = '1';
    }
    PostService.find({page:pageNumber},function(res) {   
      try {
        if(res != undefined) { 
          $scope.posts  = res.data.data; // list posts
          $scope.total  = res.data.total; 
          $scope.currentPage  = res.data.current_page;
          $scope.lastPage  = res.data.last_page;
          $scope.totalPages = [];
          for($i = 1; $i <= $scope.lastPage; $i++) {
            $scope.totalPages.push($i);  
          }
          $scope.prePage = ($scope.currentPage == 1) ? 1 : $scope.currentPage-1;
          $scope.nextPage = ($scope.currentPage == $scope.lastPage) ? $scope.currentPage : $scope.currentPage+1;
        } else {
          throw "undefined";
        }
      } catch(err) {
        toastr.error(err);
      }
    });  
  };
  /**
  ** function get list categories parent
  ** service CategoryService 
  ** api:  web_api/category/
  ** return response
  **/
  CategoryService.find({}, function(res){  
    try {  
      if(typeof res != undefined) { 
        if(res.is_success) { 
          $scope.listCatParent = res.data  
        } else { // can't get list categories parent
          throw res.errors;  
        }
      } else {
        throw "undefined"; 
      }
    } catch(err) {
      toastr.error(err);
    }
  });
  /**
  ** function get list categories childrent
  ** service CategoryChildrenService 
  ** api: /web_api/category/categorychildren/:id,
  ** param idCatParent
  ** return response
  **/
  $scope.getCatChildren = function(idCatParent){
    try {
      CategoryChildrenService.find({id: $scope.categoryParent},function (res) { 
        if (typeof res != "undefined") { 
          if(res.is_success) {
            $scope.listCatChildrent = res.data;  
          } else { // can't get list categories childrent
            throw res.errors;
          }
        } else {
          throw "undefined"; 
        }
      }); 
    } catch(err) {
      toastr.error(err);
    }
  };
  /**
  ** function get list release
  ** service ReleaseService 
  ** api: /web_api/release/
  ** return response list release
  **/
  ReleaseService.find({}, function(res){
    try {
      if(res != undefined) {
        if(res.is_success) { 
          $scope.listRelease = {
            model: null,
            availableOptions: res.data.data
          };
        } else {
          throw res.error;
        }
      } else {
        throw "undefined";
      }
    } catch(err) {
      toastr.error(err);
    }
  });
  /**
  ** array status post 
  ** 
  **/     
  $scope.listStatus = {
    availableOptions : [ 
      { id : 1 , name : 'Draff'},
      { id : 2 , name : 'Chuẩn bị công khai'},
      { id : 3 , name : ' Công khai'},
      { id : 4 , name : ' Không công khai'},
    ] ,
    selectedOption: { id: 1, name: 'Draff'} 
  };
    
  /**
  ** function search post
  ** service PostService 
  ** api: /web_api/post/,
  ** param releaseNumber, categoryParent, categoryChildren, status, username
  ** return response API
  **/  
  /*$scope.searchPost = function() {
    PostService.get({
      releaseNumber : $scope.releaseNumber ,
      categoryParent : $scope.categoryParent, 
     // categoryChildren : $scope.categoryChildren,
      status : $scope.status, 
      //username : $scope.username    
    }, function(res) {
      try {
        if(typeof res != undefined) { 
          if (res.is_success) { console.log(res);
            $scope.posts = res.data.data; 
          } else {
            throw res.errors;  
          }  
        } else {
          throw "undefined";
        } 
      } catch(err) {
        toastr.error(err);
      }
    });   
  } ;*/
  /**
  ** function save images
  ** service uploadImage 
  ** api: /web_api/images/,
  ** param array image
  ** return promise
  **/ 
  $scope.getPathImage = function(files) { 
    var def = $q.defer(); 
    if(files != undefined && files.length > 0) {        
      var res = uploadImage.upload(files, 'archive');
      for (var i = 0; i < res.length; i++) {
        res[i].success(function(res) { 
          def.resolve(res.data);
        }).error(function(res) {
          def.reject(res.error);
        }); 
      }
    } else {
      def.reject("undefined"); // goi trans tu lang.js
    }  
    return def.promise;
  };
  /**
  ** function get list image of detail post
  ** function $watch
  ** return array images key = id_image , value = image
  **/ 
  $scope.files = []; // list image of detail post
  $scope.$watch('file', function(){ 
    if($scope.file != undefined ) {
      $scope.getPathImage($scope.file).then(function(data){
        try { 
          var img = {
            'key' :data.id_image,
            'data':$scope.file[0],  // sua lai theo duong dan data tra ve.
          };
          if($scope.files.push(img)) {
            $scope.file = null; img = null;
            toastr.success("success"); // goi trans tu lang.js
          } else {
            throw "can not "; // goi trans tu lang.js
          }   
        } catch(err){
          toastr.error(err);
        }
      }).catch(function(err){
        console.log(err);
        toastr.error("loi api");
      });
    } 
  });
  /**
  ** function detele image on list image detail post
  ** service ImageResource 
  ** api: /web_api/images/,
  ** methoad delete
  ** param $index , $idImage
  ** return @@
  **/ 
  $scope.deleteImagePost = function($index, $idImage) {
    try {
      if($index != undefined || $idImage != undefined ) { 
        ImageService.delete({ id: $idImage}, function(res) { 
          if(res != undefined) {
            if(res.is_success) {
              $scope.files.splice($index, 1)
              toastr.success('success')
            } else {
              throw "can not delete"
            }
          } else {
            throw "loi api"
          }
        });
      } else {
        throw "undefined";
      }
    } catch(err) {
      toastr.error(err);
    }
  };
  /**
  ** function get status post 
  ** param dateBegin
  ** return status
  **/ 
  function getStatus(dateBegin = null){
    var startDate = dateBegin.getTime(); 
    var endDate = parseDate("01/01/3000").getTime(); 
    return (startDate < endDate ) ? 1 : 4;
  };
  /**
  ** function get status post 
  ** param string
  ** return new date
  **/ 
  function parseDate(str) {
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[1], mdy[0]);
  }
  /**
  ** function save post
  ** service PostService 
  ** api: /web_api/post/,
  ** param .....
  ** return response API
  **/ 
  $scope.statusPreviewTop = true ;
  $scope.creatPost =  function() {  console.log($('textarea.editor' ).val());
    /*$scope.getPathImage($scope.thumbnail).then(function(data){ 
      try {
        $scope.post = new PostService(); // create post form PostService
        $scope.post.title =  $scope.postTitle;
        $scope.post.thumbnail_path = data.path;
        $scope.post.id_release_number = $scope.listRelease.model;
        $scope.post.time_begin = $scope.postBeginDate;
        $scope.post.time_end = '3000-01-01';
        $scope.post.status_preview_top = $scope.statusPreviewTop;
        $scope.post.content = "zxczxcxzcxz";//$scope.post.content;
        $scope.post.status = getStatus($scope.postBeginDate);
        $scope.post.$save(function(res){
          if(res.is_success) {
            toastr.success("success");
            console.log(res);
          } else {
            throw res.errors;
          } 
        });
      } catch(err){
        toastr.error(err);
      }
    }).catch(function(err){ toastr.error(err);});   */
  };

}])



var app = angular.module("CKEditorExample", ["ngCkeditor"]);
  app.directive('ckEditor', function () {
  return {
    require: '?ngModel',
    link: function (scope, elm, attr, ngModel) {
      var ck = CKEDITOR.replace(elm[0]);
      if (!ngModel) return;
      ck.on('instanceReady', function () {
        ck.setData(ngModel.$viewValue);
      });
      function updateModel() {
        scope.$apply(function () {
          ngModel.$setViewValue(ck.getData());
        });
      }
      ck.on('change', updateModel);
      ck.on('key', updateModel);
      ck.on('dataReady', updateModel);

      ngModel.$render = function (value) {
        ck.setData(ngModel.$viewValue);
      };
    }
  };
});

app.controller("MainCtrl", ["$scope", function($scope){
  $scope.content = "<p> this is custom directive </p>";
  $scope.content_two = "<p> this is ng-ckeditor directive </p>";
}]);


 <h1>Method 1</h1>
    <textarea ng-model="content" data-ck-editor></textarea>
    
    {{content}}
    
    <hr>
    
    <h1>Method 2</h1>
    <textarea ckeditor="editorOptions" ng-model="content_two"></textarea>
    
    {{content_two}}







 
        
      