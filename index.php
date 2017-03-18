<!DOCTYPE html>
<html ng-app="myApp">
	<head>
		<title>Dnevnik rada</title>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-cookies.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet">
		<script src="js/app.js"></script>
		<script src="js/ui-bootstrap-tpls-0.14.3.min.js"></script>
	</head>
	<body>
		<center><h1 class="naslovna">DNEVNIK RADA</h1></center>
		<div ng-controller="loginCtrl">
			<center><button ng-click="open()" class="btn btn-warning prijava">Prijava</button></center>
		</div>
	</body>
</html>
