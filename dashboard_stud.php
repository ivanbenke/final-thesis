<?php
	$server = "localhost";
	$username = "admin";
	$password = "admin";
	$database = "login";
	$conn = mysqli_connect($server, $username, $password, $database);
	mysqli_query($conn, "SET NAMES UTF8");
	
	$user = $_COOKIE['user'];
	$q="SELECT izvjestaj.id, izvjestaj.datum, izvjestaj.tvrtka, izvjestaj.komentar, izvjestaj.ocjena FROM izvjestaj, login_stud WHERE '$user'=login_stud.user AND izvjestaj.user=login_stud.user ORDER BY id DESC";
	$res = mysqli_query($conn, $q);
	
	$q1="SELECT login_stud.ime FROM login_stud WHERE login_stud.user='$user'";
	$res1 = mysqli_query($conn, $q1);
	
	$zbroj=0;
	$br=0;
	$q2="SELECT izvjestaj.ocjena FROM izvjestaj, login_stud WHERE '$user'=login_stud.user AND izvjestaj.user=login_stud.user AND izvjestaj.ocjena != 0";
	$res2 = mysqli_query($conn, $q2);
	
	$q3="SELECT login_ment.ime FROM login_ment, login_stud WHERE login_stud.user='$user' AND login_stud.mentor=login_ment.user";
	$res3 = mysqli_query($conn, $q3);
?>

<html ng-app="uploadApp">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-cookies.js"></script>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link href="style.css" rel="stylesheet">
		<script src="js/app_upload.js"></script>
		<script src="js/ui-bootstrap-tpls-0.14.3.min.js"></script>
	<title>Homepage</title>
	</head>
	<body>
		<div class="glavni_div">
			<div ng-controller="uploadCtrl" class="dodaj_div">
				<button ng-click="openModal()" class="btn btn-warning dodaj">Dodaj izvještaj</button>
			</div>
			<div class="top_div">
				<center><h1 class="welcome">
				Student:
				<?php
				while ($row1 = mysqli_fetch_array($res1)) {
					echo $row1['ime'];
				}
				?>
				</h1><br><h2 class="mentor">Mentor:
				<?php			
				while ($row3 = mysqli_fetch_array($res3)) {
					echo $row3['ime'];
				}
				?>
				</h2></center>
				<center><?php
				while ($row2 = mysqli_fetch_array($res2)) {
					$zbroj+=$row2['ocjena'];
					$br++;
					if ($row2['ocjena'] == 1) {
						$zbroj--;
						$br--;
					}
				}
				if ($zbroj == 0 && $br == 0) {
					echo '<h4>Ukupna ocjena: nije ocijenjen nijedan izvjestaj.</h4>';
				} else {
					$arit = $zbroj/$br;
					echo '<h4>Ukupna ocjena: '.round($arit, 3).'</h4>';
				}
				?></center>
			</div>
			<div ng-controller="logoutCtrl" class="logout_div">
				<button ng-click="logout()" class="btn logout">Odjava</button>
			</div>
		</div>
		<div ng-controller="reviewCtrl" class="review_div">
			<?php			
			while ($row = mysqli_fetch_array($res)) {
				if ($row['komentar'] == 0 AND $row['ocjena'] == 0) {
					echo "<button ng-click='openReview(".$row['id'].")' class='btn btn-primary stud_review'>".$row['datum'].", ".$row['tvrtka'].", neocijenjeno"."</button><br>";
				} else {
					echo "<button ng-click='openReview(".$row['id'].")' class='btn btn-primary stud_review'>".$row['datum'].", ".$row['tvrtka'].", ocijenjeno"."</button><br>";
				}
			}
			?>
		</div>
	</body>
</html>
