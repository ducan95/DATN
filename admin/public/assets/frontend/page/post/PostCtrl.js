

/**
 * Show and delete User
 * */

SOUGOU_ZYANARU_MODULE.controller('PostCtrl',
['$scope', 'PostService','CategoryService','ListCategoryService','ImageService','CategoryChildrenService', 
'uploadImage', '$q', '$window', 'toastr', 'tranDate', 'ReleaseService','popupService',
function($scope, PostService,CategoryService,ListCategoryService, ImageService, CategoryChildrenService, 
uploadImage, $q, $window, toastr, tranDate, ReleaseService,popupService){

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
  $scope.getPosts = function(pageNumber) { 
    if (pageNumber === undefined) {
        pageNumber = '1';
    }
    PostService.find({page:pageNumber},function(res) {
      console.log(res)
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
  /**
  ** function get list user
  ** service UserService 
  ** api:  web_api/user/
  ** return response
  **/

  // UserService.find({}, function(res){  
  //   try {  
  //     if(typeof res != undefined) { 
  //       if(res.is_success) { 
  //         $scope.users = res.data;  
  //       } else {
  //         throw res.errors;  
  //       }
  //     } else {
  //       throw "undefined"; 
  //     }
  //   } catch(err) {
  //     toastr.error(err);
  //   }
  // });

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
      // $scope.listcategorychil=function(id_category){
        $scope.category.$find({},function (res){
        if (typeof res != "undefined") { 
          $scope.categoryChildren=res.data;
          // for(i=0;i<=res.data.length;i++){
          //   if(res.data[i].id_category_parent === id_category){
          //     $scope.categoryChildren.push(res.data[i]);
          //   }
          // }
          // console.log($scope.categoryChildren)
          // angular.forEach($scope.categoryChildren, function(value) {
          //   if(value.id_category_parent == id_category){
          //     $scope.ducan={
          //     categoryParent:[
          //       key=value.id_category,
          //       data =value.name,
          //     ]
          //   }
          //    console.log($scope.ducan)
          //   }
          // })
        }
        });
      // }

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
    // console.log($scope.listRelease.model);
    // console.log($scope.categoryParent);
    // console.log($scope.categoryChildren);
    // console.log($scope.status);
    // return false;
    PostService.get({
      releaseNumber : $scope.listRelease.model ,
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
      timeBegin: {
        presence: true,
        // minimum:date
      },
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
        $scope.status=getStatus($scope.postBeginDate);
        $scope.listpost.data={
          post : {
            title :  $scope.postTitle,
            thumbnail_path : data.path,
            id_release_number : $scope.listRelease.model,
            time_begin : function() {
              day = $scope.postBeginDate .getDate() > 9 ? $scope.postBeginDate .getDate() : '0'+ $scope.postBeginDate .getDate();
              month = $scope.postBeginDate .getMonth() > 8 ? ($scope.postBeginDate.getMonth()+1) : '0' +($scope.postBeginDate.getMonth()+1);
              year=$scope.postBeginDate.getFullYear();
              return year+"-"+month+"-"+day;
            }(),
            // time_begin:$scope.postBeginDate,
            time_end : '3000-01-01',
            content : editor_data,
            status : $scope.status,
            password :'123'
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

  //  $scope.redirectPost = function (id_post) { 
  //   $window.location.href = '/admin/post/edit#id='+id_post;
  //   $scope.id_post = id_post;
  // }



  $scope.ridirectquickedit=function(id_post){
    var editpost=PostService.get({id : id_post},function(res){
      if (typeof res != "undefined") {
        var editpost= res.data;
        $scope.quickedit = function (editpost){
        var form = document.querySelector("form#myModal");

        //Get value from ng-model
        var gettitle = editpost.title;
        var getreleasenumber = editpost.releasenumber;
        var gettime_begin = editpost.time_begin;
        var gettime_end = editpost.time_end;
        var getstatus=editpost.status_post;

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
          password            :editpost.password
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
  $scope.date = new Date();

  //update post
  var url        = new URL(window.location.href); 
  var id         = url.hash.match(/\d/g);
  $scope.id      = id.join('');

  $scope.Updatepost = function (post) {
      var editor_data = CKEDITOR.instances['editor1'].getData(); 
      PostService.update({
        id              : $scope.id,
        title           :post.title,
        slug            :post.title,
        id_release_number:  $scope.listRelease.model,
        time_begin : function() {
          day = $scope.postBeginDate .getDate() > 9 ? $scope.postBeginDate .getDate() : '0'+ $scope.postBeginDate .getDate();
          month = $scope.postBeginDate .getMonth() > 8 ? ($scope.postBeginDate.getMonth()+1) : '0' +($scope.postBeginDate.getMonth()+1);
          year=$scope.postBeginDate.getFullYear();
          return year+"-"+month+"-"+day;
        }(),
        // time_begin:$scope.postBeginDate,
        time_end : '3000-01-01',
        content : editor_data,
        status : 1,
        password :'123'
      }, function (){
        // Redirect
        // $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/user';
      });
    // }
  };

  $scope.loadPost = function () { 
    PostService.get({ id: $scope.id },function(res) {
    $scope.post = res.data[0];
    console.log($scope.post)
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









 
        
      