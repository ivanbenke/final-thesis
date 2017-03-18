var app = angular.module('uploadApp', ['ui.bootstrap', 'ngCookies']);

app.controller('uploadCtrl', ['$scope','$uibModal', '$http', '$cookies', function ($scope, $uibModal, $http, $cookies) {	
	$scope.user = $cookies.get('user');
	
	$scope.openModal = function () {
		var uibModalInstance = $uibModal.open({
			controller: 'uploadCtrl',
			templateUrl: 'dashboard_stud_modal.html'
		});
	}	
	
	$scope.upload = function () {
		var data = {
			user: $cookies.get('user'),
			datum: $scope.datum,
			tvrtka: $scope.tvrtka,
			zadatak: $scope.zadatak,
			rjesenje: $scope.rjesenje			
		};
       
        var config = {
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
			}
        }

		$http.post('dashboard_stud_modal.php', data, config)			
		.then(function successCallback(response) {
			console.log(response);
			window.location.reload();
		}, function errorCallback(reponse) {
			console.log(response);
		});
	}
	
	
	
}]);

app.controller('reviewCtrl', ['$scope', '$cookies', '$uibModal', function ($scope, $cookies, $uibModal) {
	$scope.openReview = function (id) {
		$scope.id = id;
		$cookies.put('id', $scope.id);
		
		var uibModalInstance = $uibModal.open({
			controller: 'reviewCtrl',
			templateUrl: 'dashboard_stud_review.php'
		});
		uibModalInstance.result.then(function () {
			console.log();
		}, function () {
			console.log();
			$cookies.remove('id');
			window.location.reload();			
		});
	}
}]);

app.controller('logoutCtrl', ['$scope', '$cookies', function ($scope, $cookies) {
	$scope.logout = function () {
		window.location = 'index.php';
		var cookies = $cookies.getAll();
		angular.forEach(cookies, function (v, k) {
			$cookies.remove(k);
		});
	}
	
}]);