/**
 * Created by rikkei on 15/12/2017.
 */
SOUGOU_ZYANARU_MODULE.module('myApp.services').factory('Entry', function($resource) {
  return $resource('/api/entries/:id'); // Note the full endpoint address
});