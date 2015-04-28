app.controller('profileController', ['$scope', function($scope){
	$scope.init = function(){
		console.log('profileController -> init: ');
		console.dir(profile_data);
		if(profile_data.user_exists == 1){
			$scope.greetingShow = true;
			if(profile_data.you == 1){ $scope.youShow = true; }
		}
		else{ $scope.userExistsShow = true; }
	}
}]);