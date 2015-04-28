app.controller('authController', ['$scope', '$http', '$cookies', 'baseUrl', 'dbConnect', 'formService', function($scope, $http, $cookies, baseUrl, dbConnect, formService){
	$scope.user = {};
	$scope.loginForm = {login: '', password: ''};
	$scope.defaultCookies = function(){
		$cookies.currentLogin = JSON.stringify({id: '', login: '', password: ''});
	}
	$scope.checkEmpty = function(element){
		return formService.checkEmpty(element);
	}
	$scope.baseUrl = baseUrl;

	//Init
	if($cookies.currentLogin == null){ $scope.defaultCookies(); }
	var currentLogin = JSON.parse($cookies.currentLogin), data = $.param({login: currentLogin.login, password: currentLogin.password});
	dbConnect({url: 'php/connect.php', data: data},
		{controller: 'authController', event: 'init', scope: $scope});

	//connect success
	$scope.$on('successConnect', function(events, output){
		var data = output.data;
		switch(output.dependency.event){
			case 'init':
				formService.consoleShowData(output);
				if(data.errorId == 0){
					$scope.user.id = data.id, $scope.user.name = data.login;
					$scope.greetingShow = true, $scope.errorShow = false;
				}
				else{ $scope.defaultCookies(); }
				break;
			case 'submit':
				formService.consoleShowData(output);
				if(data.errorId == 0){
					$scope.user.id = data.id, $scope.user.name = data.login;
					$scope.greetingShow = true, $scope.errorShow = false;
					$cookies.currentLogin = JSON.stringify({id: data.id, login: data.login, password: data.password});
				}
				else{ formService.errorFunction(data.errorId, output.dependency);
				 }
				break;
			default:
				delete output.dependency.scope;
				formService.errorFunction(5, output.dependency);
		}
	});

	//events
	$scope.authSubmit = function(){
		var dependency = {controller: 'authController', event: 'submit', scope: $scope};
		if($scope.loginForm.login !== undefined){
		var data = $.param({ login: angular.lowercase($scope.loginForm.login), password: $scope.loginForm.password});
		dbConnect({url: 'php/connect.php', data: data},
			dependency);
		}
		else{ formService.errorFunction(6, dependency); }
	}
	$scope.logout = function(){
		$scope.defaultCookies();
		$scope.greetingShow = false;
	}
}]);