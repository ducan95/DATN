

/**
 * Show and delete User
 * */
  SOUGOU_ZYANARU_MODULE.controller('PostCtrl',
  function ($scope, PostService, CategoryService, CategoryChildrenService, $q, $window, uploadImage, toastr) {
    //Get list users
    PostService.find({}, function (res) {
      if (typeof res != "undefined") {  
        $scope.posts = res.data;
       // console.log($scope.posts)
      }
    })
    //Get list category parent
    CategoryService.find({},function(res){
      if(typeof res != "undefined"){
        $scope.categories = res.data;
       // console.log($scope.categories);
      }
    })
    //Get list category children
    $scope.getCatChildren = function(){
      CategoryChildrenService.find({id: $scope.categoryParent},function (res) {
        if (typeof res != "undefined") { 
          $scope.categoryChildrens = res.data;
        //  console.log($scope.categoryChildrens);
        }
      });
    }
    //Get list status
    $scope.status = [ 
      { id : 1 , name : 'Draff'},
      { id : 2 , name : 'Chuẩn bị công khai'},
      { id : 3 , name : ' Công khai'},
      { id : 4 , name : ' Không công khai'},
    ];
    //search post
    $scope.searchPost = function() {
      PostService.get({search:$scope.parameter}, function(res) {
        if(typeof res != "undefined") {
            $scope.posts = res.data;
        }
      });   
    }

    $scope.ridirectquickedit=function(id_post) { 
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
          var getstatus=editpost.status_post;
          var deleted_at=null;
          var is_deleted=false;

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
          
          // Update post
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
   
          $scope.status=[{key:'1',value :'Draff'},{key:'2',value :'ABC'},{key:'3',value :'KFH'}];

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
    // get category children whit id category parent
    $scope.catChildren = [];
    $scope.category =new CategoryChildrenService();
    $scope.listcategorychil=function(id_category) { 
      $scope.category.$find({id: id_category},function (res) {
        if (typeof res != "undefined") { 
          $scope.catChildren['key'] = id_category;
          $scope.catChildren['data'] = res.data;
        }
      });
    }

    // save post
    /* get path thumbnail*/
    $scope.getPathImage = function(files) { 
      if(files != undefined && files.length > 0) {  
        var res = uploadImage.upload(files,'archive');
        for (var i = 0; i < res.length; i++) {
          res[i].success(function(res) { 
            console.log(res) ;
          }).error(function(resp) {
            console.log(res);
          }); 
        }
      } 
    }
    //get path image of detail post
    $scope.files = []  ; // image detail post
    $scope.$watch('file', function() { 
      if($scope.file != undefined) { 
        $scope.files.push($scope.file[0]); 
      }
    });
   /* $scope.getPathImage = function(files) {  
      if( files != undefined && files.length > 0) { 
        $res = uploadImage.upload(files, 'archive');
        for(var i = 0; i < $res.length; i++) { 
          var defImage = $q.defer(); //create deferrend
          .success( function(resp) {
            defImage.resolve(resp);
          }).error(function(resp) {
            defImage.reject(resp);
          });  
        }
        
      }  
     //return  defImage.promise; 
    }*/
    // delete image Post Client
    $scope.deleteImagePost = function($index) {
      if($index != undefined) {
        $scope.files.splice($index, 1);  
      }
    }
  
    // save post
    $scope.creatpost = function(){ 
        $scope.getPathImage($scope.thumbnail);
        $scope.getPathImage($scope.files);
    };



}); 





 
        
      