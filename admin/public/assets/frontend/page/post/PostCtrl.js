

/**
 * Show and delete User
 * */

SOUGOU_ZYANARU_MODULE.controller('PostCtrl',
['$scope', 'PostService','CategoryService','UserService','ListCategoryService','ImageService','CategoryChildrenService', 
'uploadImage', '$q', '$window', 'toastr', 'tranDate', 'ReleaseService','popupService','$sce',
function($scope, PostService,CategoryService,UserService,ListCategoryService, ImageService, CategoryChildrenService, 
uploadImage, $q, $window, toastr, tranDate, ReleaseService,popupService,$sce){

  $scope.redirectEdit = function (id_post) { 
    $window.location.href = '/admin/post/edit#id='+id_post;
    $scope.id_post = id_post;
  }
  $scope.dateStart = tranDate.tranDate('2017-11-30');
  /**
  ** function get list posts
  ** service PostService 
  ** api:  web_api/post/
  ** param pageNumber
  ** return response API 
  **/
  $scope.searchPost = function() {
      PostService.find({release_name:$scope.parameter,title:$scope.parameter},function(res) {
      if(typeof res != "undefined") {
        if(res.is_success ){
          $scope.posts = res.data.data; 
        } else {
        }
      }
    });   
  }
  $scope.getPosts = function(pageNumber) { 
    if (pageNumber === undefined) {
        pageNumber = '1';
    }
    PostService.find({page:pageNumber},function(res) {
      try {
        if(res != undefined) { 
          $scope.posts  = res.data.data;
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
  
  $scope.deletepost = function (id_post) {
    var options = {
      title: "Bạn có chắc chắn xóa không？",
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
              PostService.delete({ id: id_post},function () {
              //Ridirect
              $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/post';
            });
      }
    });
  }
  
   $scope.doacept=function(post){
    $scope.id=post.id_post;
     PostService.update({
        id               :  $scope.id,
        title            :  post.title,
        slug             :  post.title,
        id_user          :  post.id_user,
        content          :  post.content,
        thumbnail_path   :  post.thumbnail_path,
        id_release_number:  post.id_release_number,
        is_acept         :  true
      }, function (){
        // Redirect
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/post';
      });
   }

   $scope.unacept=function(post){
    $scope.id1=post.id_post;
    PostService.update({
       id              :   $scope.id1,
       title            :  post.title,
       slug             :  post.title,
       id_user          :  post.id_user,
       content          :  post.content,
       thumbnail_path   :  post.thumbnail_path,
       id_release_number:  post.id_release_number,
       is_acept         :  false
     }, function (){
       // Redirect
       $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/post';
     });
  }

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


   CategoryService.find({},function(res){
      if(typeof res != "undefined"){
        $scope.categories = res.data;
      }
    })

    $scope.category =new ListCategoryService();
        $scope.category.$find({},function (res){
        if (typeof res != "undefined") { 
          $scope.categoryChildren=res.data;
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
          // console.log($scope.listRelease)
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
      $scope.getPathImage($scope.file).then(function(data){console.log(data)
        try { 
          var img = {
            'key' :data.id_image,
            'data':data.path,  // sua lai theo duong dan data tra ve.
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
  // $scope.category=[];
  // $scope.$watch(function(){
  //   if (true) {}
  // })
  $scope.category=[];
  $scope.getcategory=function(id_category){
    if(id_category){
      $scope.check = 0;
        angular.forEach($scope.category, function(value){
          if(value == id_category) $scope.check = 1;
        })
        if($scope.check == 1){
          $scope.category.pop(id_category)
        } else {
          $scope.category.push(id_category);
          $scope.check = 0;
        }
    }
    // console.log($scope.category)
  }
  $scope.date = new Date();
  $scope.creatPost =  function() { 
    var constraints = {
      title: {
        presence:true,
      }

    };
    var form = document.querySelector("form#main");
    validate.validators.presence.message = 'Vui lòng nhập vào';
    $scope.error = validate(form, constraints);
    if ($scope.error == undefined) {
    $scope.getPathImage($scope.thumbnail).then(function(data){ 
      try {
        var editor_data = CKEDITOR.instances['editor1'].getData();
        $scope.listpost = new PostService(); // create post form PostService
        $scope.listpost.data={
          post : {
            title :  $scope.postTitle,
            thumbnail_path : data.path,
            id_release_number : $scope.listRelease.model,
            content : editor_data
          },
          post_category : {
            id_category:$scope.category,
          }
        }
        $scope.listpost.$save(function() {
          // console.log($scope.listpost);
          $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/post/';
      });
      } catch(err){
        toastr.error(err);
      }
    }).catch(function(err){ toastr.error(err);});
    }   
  };

  $scope.review=function(id_post){
    $scope.editpost=PostService.get({id :id_post},function(res){
      if(typeof res != "undefined"){
        $scope.editpost1=res.data[0].title;
        var edit=res.data[0].content;
        $scope.editpost=$sce.trustAsHtml(edit);
      }
    })
  }

  
  $scope.redirectPost = function (id_post) { 
    $scope.id_post = id_post;
    $window.location.href = '/admin/post/edit#id='+id_post;
  }
}])


.controller('PostUpdateCtrl',['$scope', 'PostService','CategoryService','ListCategoryService','ImageService','CategoryChildrenService', 
'uploadImage', '$q', '$window', 'toastr', 'tranDate', 'ReleaseService','popupService',
function($scope, PostService,CategoryService,ListCategoryService, ImageService, CategoryChildrenService, 
uploadImage, $q, $window, toastr, tranDate, ReleaseService,popupService){
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
  $scope.$watch('post.file', function(){ 
    if($scope.file != undefined ) {
      $scope.getPathImage($scope.file).then(function(data){
        try { 
          var img = {
            'key' :data.id_image,
            'data':data.path,  // sua lai theo duong dan data tra ve.
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
  $scope.date = new Date();
  //check category
  $scope.catego=[];
    $scope.getcategory=function(id_category){
      if(id_category){
        $scope.check = 0;
          angular.forEach($scope.catego, function(value){
            if(value == id_category) $scope.check = 1;
          })
          if($scope.check == 1){
            $scope.catego.pop(id_category);
          } else {
            $scope.catego.push(id_category);
            $scope.check = 0;
          }
      }
      // console.log($scope.category)
    }

  var url        = new URL(window.location.href); 
  var id        = url.hash.match(/\d/g);
  $scope.id2     = id.join('');

  $scope.Updatepost = function(post){
    $scope.getPathImage($scope.thumbnail).then(function(data){
      try { 
      var editor_data = CKEDITOR.instances['editor1'].getData();
      var request_post={
          post:{
            id              : $scope.id2,
            thumbnail_path  : data.path,
            content         : editor_data,
            title           : post.title,
            slug            : post.title,
            id_release_number:  $scope.listRelease.model,
            is_acept :false
            },
          post_category:{
            id_category:$scope.catego,
            id_category_before:$scope.post.id_release_number
            }
          }
        PostService.update(request_post,function(){
          $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/user';
         });
      }catch(err){
        toastr.error(err);
      }
    })
  }

  $scope.loadPost = function () { 
    PostService.get({ id: $scope.id2 },function(res) {
    $scope.post = res.data[0];
    $scope.post.time_begin = new Date($scope.post.time_begin);
    });
  };
  $scope.loadPost();

  ReleaseService.find({}, function(res){
    try {
      if(res != undefined) {
        if(res.is_success) { 
          $scope.listRelease = {
            model: null,
            availableOptions: res.data.data
          };
          // console.log($scope.listRelease)
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

  CategoryService.find({},function(res){
      if(typeof res != "undefined"){
        $scope.categories = res.data;
      }
    })

    $scope.category =new ListCategoryService();
        $scope.category.$find({},function (res){
        if (typeof res != "undefined") { 
          $scope.categoryChildren=res.data;
        }
        });

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
}])









 
        
      