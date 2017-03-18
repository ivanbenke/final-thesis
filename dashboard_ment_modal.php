<?php
	$server = "localhost";
	$username = "admin";
	$password = "admin";
	$database = "login";
	$conn = mysqli_connect($server, $username, $password, $database);
	mysqli_query($conn, "SET NAMES UTF8");
	
	$data = json_decode(file_get_contents("php://input"));
	$komentar = $data->komentar;
    $ocjena = $data->ocjena;
	
	$user = $_COOKIE['user'];
	$id = $_COOKIE['id'];
	if ($komentar==NULL AND $ocjena!=NULL) {
		$q="UPDATE izvjestaj SET ocjena='$ocjena' WHERE izvjestaj.id='$id'";
	} else if ($komentar!=NULL AND $ocjena==NULL){
		$q="UPDATE izvjestaj SET komentar='$komentar' WHERE izvjestaj.id='$id'";
	} else {
		$q="UPDATE izvjestaj SET komentar='$komentar', ocjena='$ocjena' WHERE izvjestaj.id='$id'";
	}
	$res = mysqli_query($conn, $q);
	
?>
