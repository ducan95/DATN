

/**
 * Show and delete User
 * */
  SOUGOU_ZYANARU_MODULE.controller('PostCtrl', function ($scope, PostService, CategoryService, CategoryChildrenService, $window) {
    //Get list users
    PostService.find({}, function (res) {
      if (typeof res != "undefined") {  
        $scope.posts = res.data;
        console.log($scope.posts)
      }
    })
    //Get list category parent
    CategoryService.find({},function(res){
      if(typeof res != "undefined"){
        $scope.categories = res.data;
        console.log($scope.categories);
      }
    })
    //Get list category children
    $scope.getCatChildren = function(){
      CategoryChildrenService.find({id: $scope.categoryParent},function (res) {
        if (typeof res != "undefined") { 
          $scope.categoryChildrens = res.data;
          console.log($scope.categoryChildrens);
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
    //
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
  }); 

  SOUGOU_ZYANARU_MODULE.controller('CreatpostCtrl',function($scope, PostService, CategoryService, CategoryChildrenService){
    $scope.posts=new PostService();

    CategoryService.find({},function(res){
      if(typeof res != "undefined"){
        $scope.categories = res.data;
        console.log($scope.categories);
      }
    })

    $scope.categoryChildren = [];
    $scope.category =new CategoryChildrenService();
    $scope.listcategorychil=function(id_category) {
      $scope.category.$find({id: id_category},function (res) {
        if (typeof res != "undefined") { 
          $scope.categoryChildren['key'] =id_category;
          $scope.categoryChildren['data'] = res.data;
        }
      });
    }

    $scope.status=[{key:'1',value :'Draff'},{key:'2',value :'ABC'},{key:'3',value :'KFH'}];
    console.log($scope.status)
    $scope.creatpost=function(){
      $scope.posts.$save(function () {
        $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/post';
      });  
    }
  })
 
        
      