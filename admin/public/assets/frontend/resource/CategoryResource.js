
SOUGOU_ZYANARU_MODULE.factory('CategoryResourceFactory', function($resource) {
  return $resource('/web_api/category/:id'); // Note the full endpoint address
  // return 'abc';
});