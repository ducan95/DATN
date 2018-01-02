/**
 * Created by Huynh on 1/1/2018
 * Service upload image 
 * package ng file upload of angularjs
 * @param array file, name
 * @return promise
 */
SOUGOU_ZYANARU_MODULE.service('uploadImage', function(Upload){
  this.upload = function (files, name) {
    if (files && files.length) { 
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.$error) {
          var image = Upload.upload({
            url: '/web_api/images',
            data: {
              name: name,
              file: file  
            }
          });
          return image;
        }
      }
    } 
  };
});