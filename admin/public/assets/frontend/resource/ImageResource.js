/**
 * Created by rikkei on 15/12/2017.
 */



SOUGOU_ZYANARU_MODULE.factory('Service', ['$resource', function($resource){
  return $resource(
  	'/web_api/images/:id', 
  	{id: '@id'},
  	{ 
	    update: {
	      method: 'PUT'
	    }
		},
		{
		  	stripTrailingSlashes: true
		});
}]).service('popupService',function($window){
    this.showPopup = function(message){
      return $window.confirm(message);
    }
});

