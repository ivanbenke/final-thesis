<?php
	$server = "localhost";
	$username = "admin";
	$password = "admin";
	$database = "login";
	$conn = mysqli_connect($server, $username, $password, $database);
	mysqli_query($conn, "SET NAMES UTF8");
	
	$user = $_COOKIE['user'];
	$id = $_COOKIE['id'];
	
	$q="SELECT login_stud.ime, izvjestaj.id, izvjestaj.datum, izvjestaj.tvrtka, izvjestaj.zadatak, izvjestaj.rjesenje, izvjestaj.komentar, izvjestaj.ocjena FROM izvjestaj, login_stud WHERE izvjestaj.id='$id' AND izvjestaj.user=login_stud.user";
	$res = mysqli_query($conn, $q);
?>
	
<html>
	<head>
	
	</head>
	<body>
		<div class="modal-header">
			<center><h3 class="modal-title">Ocjena izvještaja</h3></center>
		</div>
		<div class="modal-body">
			<?php
			while ($row = mysqli_fetch_array($res)) {
				echo "<b>Ime:</b> ".$row['ime'];
				echo "<br><b>Datum:</b> ".$row['datum'];
				echo "<br><b>Tvrtka:</b> ".$row['tvrtka'];
				echo "<br><b>Zadatak:</b> ".$row['zadatak'];
				echo "<br><b>Rješenje:</b> ".$row['rjesenje'];
				if ($row['komentar']==NULL) {
					echo "<br><b>Komentar:</b> nije upisan";
				} else {
					echo "<br><b>Komentar:</b> ".$row['komentar'];
				}
				if ($row['ocjena']=='0') {
					echo "<br><b>Ocjena:</b> nije upisana";
				} else {
					echo "<br><b>Ocjena:</b> ".$row['ocjena'];
				} 
			}
			?>
		</div>
		<div class="modal-footer">
			<center><form method="post" id="reviewForm" ng-submit="review()">
				<label for="komentar">Komentar:</label>
				<textarea name="komentar" ng-model="komentar"></textarea><br><br>
				<label for="ocjena">Ocjena:</label>
				<input type="number" name="ocjena" min="1" max="5" ng-model="ocjena"><br><br><br>
				<button>Predaj</button><br><br>
			</form></center>
		</div>
	</body>
</html>