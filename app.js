var app = angular.module('myApp', ['ui.bootstrap', 'ngCookies']);

app.controller('loginCtrl', ['$scope','$uibModal', '$http', '$window', '$cookies', function ($scope, $uibModal, $http, $window, $cookies) {
	$scope.open = function () {
		var uibModalInstance = $uibModal.open({
			controller: 'loginCtrl',
			templateUrl: 'login.html'
		});
	}
	
	$scope.login = function () {
		var data = {
			user: $scope.user,
			password: $scope.password,
		};
       
        var config = {
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
			}
        }
		
		$cookies.put('user', $scope.user);
		
		$http.post('login.php', data, config)			
		.then(function successCallback(response) {
			if (response.data == "false") {
				$scope.message = 'Neispravni podaci!';
			} else {
				console.log(response);
				$window.location.href = response.data;				
			}
		}, function errorCallback(reponse) {
			console.log(response);
		});
    }
	
}]);