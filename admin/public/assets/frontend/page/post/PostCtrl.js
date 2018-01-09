

/**
 * Show and delete User
 * */

SOUGOU_ZYANARU_MODULE.controller('PostCtrl',
['$scope', 'PostService', 'CategoryService', 'ImageService', 'CategoryChildrenService', 
'uploadImage', '$q', '$window', 'toastr', 'tranDate',
function($scope, PostService, CategoryService, ImageService, CategoryChildrenService, 
uploadImage, $q, $window, toastr, tranDate ){

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
  ** array status post 
  ** 
  **/     
  $scope.listStatus = [ 
    { id : 1 , name : 'Draff'},
    { id : 2 , name : 'Chuẩn bị công khai'},
    { id : 3 , name : ' Công khai'},
    { id : 4 , name : ' Không công khai'},
  ];
  /**
  ** function search post
  ** service PostService 
  ** api: /web_api/post/,
  ** param releaseNumber, categoryParent, categoryChildren, status, username
  ** return response API
  **/  
  $scope.searchPost = function() {
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
  } ;
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
  ** function save post
  ** service PostService 
  ** api: /web_api/post/,
  ** param .....
  ** return response API
  **/ 
  $scope.statusPreviewTop = true ;
  $scope.creatPost =  function() {
    //$scope.getPathImage($scope.thumbnail).then(function(data){ 
      $scope.post = new PostService(); // create post form PostService
      $scope.post.title =  1111;//$scope.post.title;
      $scope.post.thumbnail_path = 111;//data.path;
      $scope.post.id_release_number = 111;
      $scope.post.time_begin = 1111;
      $scope.post.time_end = 1111;
      $scope.post.status_preview_top = 1111;//$scope.statusPreviewTop;
      $scope.post.content = "zxczxcxzcxz";//$scope.post.content;
      $scope.post.status = 1;//$scope.status;
      $scope.post.$save(function(res){
        if(res.is_success) {
          console.log(res);
        } else {

        }
      })  
   /* }).catch(function(err){
      toastr.error(err);
    }); */  
  };

  $scope.ridirectquickedit=function(id_post){
    var editpost=PostService.get({id : id_post},function(res){
      if (typeof res != "undefined") {
        var editpost= res.data;
        $scope.quickedit = function (editpost){
        var form = document.querySelector("form#myModal");

        //Get value from ng-model
        var gettitle = editpost.title;
        var getreleasenumber = 1;
        var gettime_begin = editpost.time_begin;
        var gettime_end = editpost.time_end;
        var deleted_at=null;
        var is_deleted=false;
        var getstatus=editpost.status_post;

        console.log(gettitle)
        console.log(getreleasenumber)
        console.log(gettime_begin)
        console.log(gettime_end)
        console.log(getstatus)
        console.log(id_post)
        console.log(editpost.slug)
        console.log(editpost.thumbnail_path)
        console.log(editpost.status_preview_top)
        console.log(editpost.id_user)
        console.log(deleted_at)
        console.log(is_deleted)
        // Update category
        PostService.update({
          id              : id_post,
          title           :gettitle,
          slug            :editpost.slug,
          id_user         :editpost.id_user,
          id_release_number: getreleasenumber,
          time_begin        : gettime_begin,
          time_end          : gettime_end,
          status            : getstatus,
          thumbnail_path    :editpost.thumbnail_path,
          status_preview_top :editpost.status_preview_top,
          password            :editpost.password,
          deleted_at          :deleted_at,
          is_deleted          : is_deleted
        },function (){
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/post';
          });
        } 
 
        $scope.status=[
        { id : 1 , name : 'Draff'},
        { id : 2 , name : 'Chuẩn bị công khai'},
        { id : 3 , name : ' Công khai'},
        { id : 4 , name : ' Không công khai'},
        ];
        console.log($scope.status)


        $scope.loadPost = function () { 
          PostService.get({ id: id_post },function(res) {
          $scope.editpost = res.data[0];
          // console.log($scope.editpost)
          });
        };
        $scope.loadPost();
      }
    });
  }

}])






 
        
      