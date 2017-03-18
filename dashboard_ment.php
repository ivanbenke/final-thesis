<?php
	$server = "localhost";
	$username = "admin";
	$password = "admin";
	$database = "login";
	$conn = mysqli_connect($server, $username, $password, $database);
	mysqli_query($conn, "SET NAMES UTF8");
	
	$user = $_COOKIE['user'];
?>

<html ng-app="reviewApp">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-cookies.js"></script>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link href="style.css" rel="stylesheet">
		<script src="js/app_review.js"></script>
		<script src="js/ui-bootstrap-tpls-0.14.3.min.js"></script>
	<title>Homepage</title>
	</head>
	<body ng-controller="reviewCtrl">
		<div class="glavni_div">
			<div>
				<center><h1 class="welcome">
				Mentor:
				<?php
				$q1="SELECT login_ment.ime FROM login_ment WHERE login_ment.user='$user'";
				$res1 = mysqli_query($conn, $q1);
				while ($row = mysqli_fetch_array($res1)) {
					echo $row['ime'];
				}
				?>
				</h1>
				<h4 class="mentor">
				<?php
				$q2="SELECT login_stud.user FROM login_stud WHERE login_stud.mentor='$user'";
				$res2 = mysqli_query($conn, $q2);
				$br=0;
				while ($row = mysqli_fetch_array($res2)) {
					$br++;
				}
				echo "Broj studenata: ".$br;
				?>
				</h4></center>
			</div>
			<div ng-controller="logoutCtrl" class="logout_div">
				<button ng-click="logout()" class="btn logout" >Odjava</button>
			</div>
		</div>
		<div>
			<?php			
			$q="SELECT izvjestaj.id, login_stud.ime, izvjestaj.datum, izvjestaj.komentar, izvjestaj.ocjena FROM izvjestaj, login_stud WHERE '$user'=login_stud.mentor AND izvjestaj.user=login_stud.user ORDER BY id DESC";
			$res = mysqli_query($conn, $q);
			while ($row = mysqli_fetch_array($res)) {
				if ($row['komentar'] == 0 AND $row['ocjena'] == 0) {
					echo "<button ng-click='openModal(".$row['id'].")' class='btn btn-primary ment_review'>".$row['ime'].", ".$row['datum'].", neocijenjeno"."</button><br>";
				} else {
					echo "<button ng-click='openModal(".$row['id'].")' class='btn btn-primary ment_review'>".$row['ime'].", ".$row['datum'].", ocijenjeno"."</button><br>";
				}
			}			
			?>
		</div>
	</body>
</html>
