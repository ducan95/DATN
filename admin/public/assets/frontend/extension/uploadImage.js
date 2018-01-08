/**
 * Created by Huynh on 1/1/2018
 * Service upload image 
 * package ng file upload of angularjs
 * @param array file, name
 * @return promise
 */
SOUGOU_ZYANARU_MODULE.service('uploadImage', function(Upload){ 
  this.upload = function (files, name) { 
    var res = [] ;
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
          res.push(image);
        }
      }
      return res;
    } 
  };
});

// Release
SOUGOU_ZYANARU_MODULE.service('uploadImg', function(Upload){
  this.upload = function (file, name) {
    if (file) { 
      var image = Upload.upload({
        url: '/web_api/images',
        data: {
          name: name,
          file: file  
        }
      });
      return image;
    } 
  };
});