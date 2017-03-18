<?php
    $server = "localhost";
	$username = "admin";
	$password = "admin";
	$database = "login";
	$conn = mysqli_connect($server, $username, $password, $database);
	mysqli_query($conn, "SET NAMES UTF8");
	
    $data = json_decode(file_get_contents("php://input"));
    $user = $data->user;
    $password = $data->password;
	
	$q1="SELECT * FROM login_stud WHERE user='$user' and password='$password'";
	$q2="SELECT * FROM login_ment WHERE user='$user' and password='$password'";
	$res1 = mysqli_query($conn, $q1);
	$res2 = mysqli_query($conn, $q2);
	if(!$res1 || mysqli_num_rows($res1)==1) {
		$site = 'dashboard_stud.php';
		header('Content-Type: application/json');
		echo json_encode($site);
	} else if (!$res2 || mysqli_num_rows($res2)==1) {
		$site = 'dashboard_ment.php';
		header('Content-Type: application/json');
		echo json_encode($site);
	} else {
		$message = false;
		echo json_encode($message);
	}	
?>