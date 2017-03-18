<?php
    $server = "localhost";
	$username = "admin";
	$password = "admin";
	$database = "login";
	$conn = mysqli_connect($server, $username, $password, $database);
	mysqli_query($conn, "SET NAMES UTF8");
	
    $data = json_decode(file_get_contents("php://input"));
	$user = $data->user;
    $datum = $data->datum;
    $tvrtka = $data->tvrtka;
	$zadatak = $data->zadatak;
	$rjesenje = $data->rjesenje;
	
	$q="INSERT INTO izvjestaj (user, datum, tvrtka, zadatak, rjesenje, komentar, ocjena) VALUES ('$user', '$datum', '$tvrtka', '$zadatak', '$rjesenje', '', '0')";
	$res = mysqli_query($conn, $q);
?>

