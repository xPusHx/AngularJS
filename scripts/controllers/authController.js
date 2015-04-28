app.controller('authController', ['$scope', '$http', '$cookies', 'dbConnect', 'errorFunction', function($scope, $http, $cookies, dbConnect, errorFunction){
	$scope.user = {};
	$scope.loginForm = {login: '', password: ''};
	$scope.defaultCookies = function(){
		$cookies.currentLogin = JSON.stringify({id: '', login: '', password: ''});
	}

	//connect success
	$scope.$on('successConnect', function(events, output){
		var data = output.data;
		function consoleShowData(){
			console.log(output.dependency.controller + ' -> ' + output.dependency.event + ' success:'), console.dir(data);
		}
		switch(output.dependency.event){
			case 'init':
				consoleShowData();
				if(data.error_id == 0){
					$scope.user = {id: data.id, name: data.name};
					$scope.greetingShow = true, $scope.errorShow = false;
				}
				else{ $scope.defaultCookies(); }
				break;
			case 'submit':
				consoleShowData();
				if(data.error_id == 0){
					$scope.user = {id: data.id, name: data.name};
					$scope.greetingShow = true, $scope.errorShow = false;
					$cookies.currentLogin = JSON.stringify({id: data.id, login: data.login, password: data.password});
				}
				else{ errorFunction.func(data.error_id, $scope); }
				break;
			default: console.log('Error! No event is specified');
		}
	});

	//events
	$scope.submit = function(){
		if($('#auth-login').val() != ''){
			if($scope.loginForm.login !== undefined){
				if($scope.loginForm.password != ''){
					var $data = $.param({
						login: angular.lowercase($scope.loginForm.login),
						password: $scope.loginForm.password
					});
					dbConnect({url: 'php/connect.php', data: $data},
						{controller: 'authController', event: 'submit'});
				}
				else{ errorFunction(5, $scope); }
			}
			else{ errorFunction(4, $scope); }
		}
		else{ errorFunction(3, $scope); }
		return false;
	}
	$scope.init = function(){
		if($cookies.currentLogin == null){ $scope.defaultCookies(); }
		var currentLogin = JSON.parse($cookies.currentLogin), $data = $.param({
			login: currentLogin.login,
			password: currentLogin.password
		});
		dbConnect({url: 'php/connect.php', data: $data},
			{controller: 'authController', event: 'init'});
	}
	$scope.exit = function(){
		console.log(123);
	}
}]);