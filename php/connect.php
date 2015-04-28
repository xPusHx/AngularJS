<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "angular_js";

	$login = $_POST['login'];
	$password = $_POST['password'];

	$return_obj = (object) array(error_id=>0, login=>$login, password=>$password);

	$connect = mysqli_connect($server, $user, $pass, $db) or die("Couldn't connect to SQL Server on $server");

	$result = "SELECT * FROM angular_js_users WHERE login='$login'";
	if($result = mysqli_query($connect, $result)){
		$rowcount = mysqli_num_rows($result);
		if($rowcount != 0){
			$row = $result->fetch_array(MYSQLI_NUM);
			if($row[2] != $password){ $return_obj->error_id = 2; }
			else{ $return_obj->id = $row[0]; }
		}
		else{ $return_obj->error_id = 1; }
		echo json_encode($return_obj);
		mysqli_free_result($result);
	}
	mysqli_close($connect);
?>