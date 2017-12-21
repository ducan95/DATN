/**
 * Created by rikkei on 20/12/2017
 */
SOUGOU_ZYANARU_MODULE
.factory('RoleService', function ($resource) {
	return $resource('/web_api/roles/:id', { id: '@id' }, {
		find: {
			url: '/web_api/roles/',
			method: 'GET',
			isArray: false
		},
	});
})


