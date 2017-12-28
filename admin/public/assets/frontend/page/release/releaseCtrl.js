/**
 * Created by Quyen Luu - 27/12/2017
 */

SOUGOU_ZYANARU_MODULE
	/**
	 * [ Show and delete release number ]
	 * @param  {[type]} $scope          [description]
	 * @return {[type]}                 [description]
	 */
	.controller('ReleaseCtrl', function ($scope, ReleaseService) {

	  ReleaseService.find({}, function (res) {
	    if (typeof res != "undefined") {  
	      $scope.releases = res.data;
	      console.log(res.data);
	    }
	  })

	})

	/**
   * [ Add new release number ]
   * @param  {[type]} $scope          [description]
   * @return {[type]}                 [description]
   */
  .controller('ReleaseAddCtrl', function ($scope, ReleaseService) {
  	//Get Friday of next 2 week
  	$scope.date = moment().day(19).format('LL'); //Friday: 5 + 7 + 7

  })



