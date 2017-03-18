var app = angular.module('reviewApp', ['ui.bootstrap', 'ngCookies']);

app.controller('reviewCtrl', ['$scope', '$uibModal', '$http', '$cookies', function ($scope, $uibModal, $http, $cookies) {	
	$scope.user = $cookies.get('user');
	
	$scope.openModal = function (id) {
		$scope.id = id;
		$cookies.put('id', $scope.id);
		
		var uibModalInstance = $uibModal.open({
			controller: 'reviewCtrl',
			templateUrl: 'dashboard_ment_review.php'			
		});
		
		uibModalInstance.result.then(function () {
			console.log();
		}, function () {
			console.log();
			$cookies.remove('id');
			window.location.reload();			
		});
	}
	
	$scope.review = function () {		
		var data = {
			komentar: $scope.komentar,
			ocjena: $scope.ocjena
		};
		
		var config = {
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
			}
        }
		
		$http.post('dashboard_ment_modal.php', data, config)			
		.then(function successCallback(response) {
			console.log(response);
			window.location.reload();
			$cookies.remove('id');
		}, function errorCallback(reponse) {
			console.log(response);
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
