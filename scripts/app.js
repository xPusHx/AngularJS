(function(){
var app = angular.module('testApp', ['ngCookies']);

app.controller('loginController', ['$scope', '$http', '$cookies', function($scope, $http, $cookies){
	$scope.greeting = '';
	$scope.error = '';
	$scope.submit = function(){
		var request = $http({
			method: 'post',
			url: 'connect.php',
			data: {
				login: $scope.login,
				password: $scope.password
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		});
		request.success(function(data){
			if(data.login_error){
				$scope.error = 'Неправильный логин';
				$scope.errorShow = true;
			}
			else if(data.password_error){
				$scope.error = 'Неправильный пароль';
				$scope.errorShow = true;
			}
			else{
				$scope.greeting = $scope.login;
				$scope.greetingShow = true;
				$scope.errorShow = false;
				//$cookies.put('login', 12334);
			}
		});
	}
}]);

})();