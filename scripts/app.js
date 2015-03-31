var errors = {error1: 'Неправильный логин', error2: 'Неправильный пароль'};

(function(){
var app = angular.module('testApp', ['ngCookies'])
	.controller('authController', ['$scope', '$http', '$cookies', function($scope, $http, $cookies){
		$scope.username = '';
		$scope.error = '';
		$scope.submit = function(){
			var request = $http({
				method: 'post',
				url: 'connect.php',
				data: $.param({login: $.trim($('#auth-login').val()).toLowerCase(), password: $('#auth-password').val()}),
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			});
			request.success(function(data){
				console.log('authController -> submit: ');
				console.dir(data);
				if(data.error_num == 0){
					$scope.username = data.login;
					$scope.greetingShow = true;
					$scope.errorShow = false;
					$scope.id = data.id;
					$cookies.id = data.id;
					$cookies.login = data.login;
					$cookies.password = data.password;
				}
				else{
					$scope.error = errors['error' + data.error_num];
					$scope.errorShow = true;
				}
			});
			return false;
		}
		$scope.init = function(){
			var request = $http({
				method: 'post',
				url: 'connect.php',
				data: $.param({	login: $cookies.login, password: $cookies.password }),
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			});
			request.success(function(data){
				console.log('authController -> init: ');
				console.dir(data);
				if(data.error_num == 0){
					$scope.username = data.login;
					$scope.greetingShow = true;
					$scope.errorShow = false;
					$scope.id = data.id;
				}
				else{ $cookies.id = $cookies.login = $cookies.password = ''; }
			});
		}
		}])
	.controller('profileController', ['$scope', '$http', '$cookies', function($scope, $http, $cookies){
		$scope.init = function(){
			console.log('profileController -> init: ');
			console.dir(profile_data);
			if(profile_data.user_exists == 1){
				$scope.greetingShow = true;
				if(profile_data.you == 1){
					$scope.youShow = true;
				}
			}
			else{
				$scope.userExistsShow = true;
			}
		}
	}]);

})();