app.factory('dbConnect', ['$http', '$rootScope', 'formService', function($http, $rootScope, formService){
	return function(params, dependency){
		var defaultOptions = {headers: {'Content-Type': 'application/x-www-form-urlencoded'}};
		if(params.options == undefined){ params.options = defaultOptions; }
		$http.post(params.url, params.data, params.options)
			.success(function(data){
				$rootScope.$broadcast('successConnect', {data: data, dependency: dependency});
			})
			.error(function(err){
				formService.errorFunction(1, dependency, params.url);
			});
	}
}]);