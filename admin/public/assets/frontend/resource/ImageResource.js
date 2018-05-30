



SOUGOU_ZYANARU_MODULE.factory('ImageService', ['$resource', function($resource){
  return $resource(
  	'/web_api/images/:id', 
  	{id: '@id'},
  	{ 
	    update: {
	      method: 'PUT'
	    }
		},
		{
		  	stripTrailingSlashes: false
		});
}]).service('popupService',function($window){
    this.showPopup = function(message){
      return $window.confirm(message);
    }
});

