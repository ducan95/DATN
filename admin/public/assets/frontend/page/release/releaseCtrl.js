/**
 * Created by Quyen Luu - 27/12/2017
 */

SOUGOU_ZYANARU_MODULE
	/**
	 * [ Show and delete release number ]
	 * @param  {[type]} $scope          [description]
	 * @return {[type]}                 [description]
	 */
	.controller('ReleaseCtrl',['$scope', 'ReleaseService', 'popupService', '$window', 'toastr', '$location', '$anchorScroll', 'trans', 'SweetAlert', function ($scope, ReleaseService, popupService, $window, toastr, $location, $anchorScroll, trans, SweetAlert) {
	  // Pagination
	  $scope.currentPage = 1;
		$scope.lastPage    = 0;
		$scope.totalPages  = 0;

		//Get Paginate and show data
		$scope.getRelease = function(pageNumber) { 
      if (pageNumber === undefined) {
        pageNumber = '1';
      }
      ReleaseService.get({ page:pageNumber },function(res) {
        if(res.data != undefined) {
        	//Get data
        	$scope.releases = res.data.data;
        	// Get paginate params
					$scope.total       = res.data.total;
					$scope.currentPage = res.data.current_page;
					$scope.lastPage    = res.data.last_page;
					$scope.totalPages  = [];
          for($i = 1; $i <= $scope.lastPage; $i++) {
            $scope.totalPages.push($i);  
          }
          $scope.prePage  = ($scope.currentPage == 1) ? 1 : $scope.currentPage-1;
          $scope.nextPage = ($scope.currentPage == $scope.lastPage) ? $scope.currentPage : $scope.currentPage+1;
        }
      });  
    };
    $scope.pageChanged = function() {
      $location.hash('top');
      $anchorScroll();
    };

	  //Delete release number

    $scope.delete = function (id, index) {
      var options = {
        title: '削除してもよろしいですか？',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "いいえ",
        confirmButtonText: "はい",
        closeOnConfirm: true,
        closeOnCancel: true,
      };
      swal(options, function(isConfirm) {
        if (isConfirm) {
          var release = ReleaseService.get({ id: id }, function (res) {
            if (typeof res != 'undefined') {
              var release = res.data;
              $scope.deleteRelease = ReleaseService.delete({ id: release.id_release_number }, function () {
                if($scope.deleteRelease.is_success == true) {
                  $scope.releases.splice(index, 1);
                  toastr.success(TRANS.SUCCESS);
                } else { 
                  toastr.error(TRANS.ERROR);
                }   
              });
            } 
          });
        }
      });
    }
    //Ridirect Edit page
    $scope.redirectEdit = function (id) { 
      $window.location.href = '/admin/release/edit#id='+id;
    }
	}])

  //------------------------------------------------------------------------
	/**
   * [ Add new release number ]
   * @param  {[type]} $scope          [description]
   * @return {[type]}                 [description]
   */
  .controller('ReleaseAddCtrl', ['$scope', 'uploadImg', '$timeout', 'ReleaseService', 'toastr', 'popupService', '$window', '$q','SweetAlert', function ($scope, uploadImg, $timeout, ReleaseService, toastr, popupService, $window, $q, SweetAlert) {
  	//Get Friday of next 2 week
  	var friday = moment().day(19).format('LL'); //Friday: 5 + 7 + 7
  	$scope.date = friday+TRANS.NUMBER;

    //Add new release number function
  	$scope.release = new ReleaseService();

  	$scope.addRelease = function () { 
      //Validate form
      var constraints = {
        name: {
          presence: true,
        },
      };
      var form = document.querySelector("form#main");
      validate.validators.presence.message = TRANS.REQUIRED;
      $scope.error = validate(form, constraints);

      // Check success
      if ($scope.error == undefined) {
        $scope.disable = false; 
        var options = {
          title: '本当ですか？',
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          cancelButtonText: "いいえ",
          confirmButtonText: "はい",
          closeOnConfirm: true,
          closeOnCancel: true,
        };
        swal(options, function(isConfirm) {
        if (isConfirm) {
          $scope.name = "cover";
          //Get image path
          function getPath(path) {
            var def  = $q.defer();
            if (path != undefined) {
              uploadImg.upload(path, $scope.name)
              .then(function(res){
                $timeout(function () {
                  //Get name after upload
                  def.resolve(res.data.data.path);
                });
              }, function(res){
                def.reject(TRANS.ERROR);
              });
            } else {
              def.resolve('');
            }
            return def.promise;
          }
         
          var promise1 = getPath($scope.release.image_release_path).then(function (value) {
            return value;
          });
          var promise2 = getPath($scope.release.image_header_path).then(function (value) {
            return value; 
          });
          var theResults = [];

          $q.all([promise1, promise2]).then(function(result){
            for (var i = 0; i < result.length; i++){
                theResults.push(result[i]);
            }
            $scope.release.image_release_path = theResults[0];
            $scope.release.image_header_path  = theResults[1];
            //Save to release table
            console.log($scope.release);
            $scope.release.$save(function () {
              if($scope.release.is_success == true) {
                $window.location.href = APP_CONFIGURATION.BASE_URL +'/admin/release';
                toastr.success(TRANS.SUCCESS);
              } else { 
                toastr.error(TRANS.ERROR);
              }   
            });
          });
        }
      });
      } else {
        $scope.disable = true;
      }
  	}
  }])
  
  /**
   * [Edit release number]
   * @param  {[type]} $scope     [description]
   * @return {[type]}            [description]
   */
  .controller('ReleaseEditCtrl', ['$scope', 'uploadImg', '$timeout', 'ReleaseService', 'toastr', 'popupService', '$window', '$q', 'trans', 'SweetAlert', function ($scope, uploadImg, $timeout, ReleaseService, toastr, popupService, $window, $q, trans, SweetAlert) {

    //Get id from url
    var url   = new URL(window.location.href); 
    var id    = url.hash.match(/\d/g);
    $scope.id = id.join('');

    $scope.updateRelease = function (release) { 
      //Validate form
      var constraints = {
        name: {
          presence: true,
        },
      };
      var form = document.querySelector("form#main");
      validate.validators.presence.message = TRANS.REQUIRED;
      $scope.error = validate(form, constraints);
      // If clean data -> Edit
      if ($scope.error == undefined) {
        var options = {
          title: trans.messageDelete,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          cancelButtonText: "いいえ",
          confirmButtonText: "はい",
          closeOnConfirm: true,
          closeOnCancel: true,
        };
        /*if (popupService.showPopup(TRANS.MSG_DELETE)) {
            $scope.name = "cover";
            //Get image path
            function getPath(path) {
              var def  = $q.defer();
              var regex = new RegExp("\imageDefault(.*)$");
              if (regex.test(path)) {
                def.resolve(path);
              } else if (path == 'assets/img/no-image.jpg') {
                def.resolve('');
              } else if (path == 'assets/img/no-banner.jpg') {
                def.resolve('');
              } else if (path != undefined) {
                uploadImg.upload(path, $scope.name)
                .then(function(res){
                  $timeout(function () {
                    //Get name after upload
                    def.resolve(res.data.data.path);
                  });
                }, function(res){
                  def.reject(TRANS.ERROR);
                });
              } else {
                def.resolve(path);
              }
              return def.promise;
            }
            var promise1 = getPath($scope.release.image_release_path).then(function (value) {
              return value;
            });
            var promise2 = getPath($scope.release.image_header_path).then(function (value) {
              return value; 
            });
            var theResults = [];

            $q.all([promise1, promise2]).then(function(result){
              for (var i = 0; i < result.length; i++){
                  theResults.push(result[i]);
              }
              $scope.release.image_release_path = theResults[0];
              $scope.release.image_header_path  = theResults[1];

              //Get value from ng-model
              var getName = release.name;

              ReleaseService.update({
                id:     $scope.id,
                name:   getName,
                image_release_path: $scope.release.image_release_path,
                image_header_path: $scope.release.image_header_path
              }, function (){
                // Redirect
                $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/release';
                toastr.success(TRANS.SUCCESS);
              });

            });

          
        }*/
        swal(options, function(isConfirm) {
          if (isConfirm) {
            $scope.name = "cover";
              //Get image path
            function getPath(path) {
              var def  = $q.defer();
              var regex = new RegExp("\imageDefault(.*)$");
              if (regex.test(path)) {
                def.resolve(path);
              } else if (path == 'assets/img/no-image.jpg') {
                def.resolve('');
              } else if (path == 'assets/img/no-banner.jpg') {
                def.resolve('');
              } else if (path != undefined) {
                uploadImg.upload(path, $scope.name)
                .then(function(res){
                  $timeout(function () {
                    //Get name after upload
                    def.resolve(res.data.data.path);
                  });
                }, function(res){
                  def.reject(TRANS.ERROR);
                });
              } else {
                def.resolve(path);
              }
              return def.promise;
            }
            var promise1 = getPath($scope.release.image_release_path).then(function (value) {
              return value;
            });
            var promise2 = getPath($scope.release.image_header_path).then(function (value) {
              return value; 
            });
            var theResults = [];

            $q.all([promise1, promise2]).then(function(result){
              for (var i = 0; i < result.length; i++){
                  theResults.push(result[i]);
              }
              $scope.release.image_release_path = theResults[0];
              $scope.release.image_header_path  = theResults[1];

              //Get value from ng-model
              var getName = release.name;

              ReleaseService.update({
                id:     $scope.id,
                name:   getName,
                image_release_path: $scope.release.image_release_path,
                image_header_path: $scope.release.image_header_path
              }, function (){
                // Redirect
                $window.location.href = APP_CONFIGURATION.BASE_URL + '/admin/release';
                toastr.success(TRANS.SUCCESS);
              });

            });
          }
        });
      }
    }

  // Show release
  $scope.loadRelease = function () { 
    ReleaseService.get({ id: $scope.id },function(res) {
      $scope.release = res.data;
    });
  }
  $scope.loadRelease(); 

}])  


