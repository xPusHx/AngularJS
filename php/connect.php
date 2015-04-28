<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "angular_js";

	$login = $_POST['login'];
	$password = $_POST['password'];

	$returnObj = (object) array(errorId=>0, login=>$login, password=>$password);

	$connect = mysqli_connect($server, $user, $pass, $db) or die("Couldn't connect to SQL Server on $server");

	$result = "SELECT * FROM angular_js_users WHERE login='$login'";
	if($result = mysqli_query($connect, $result)){
		$rowcount = mysqli_num_rows($result);
		if($rowcount != 0){
			$row = $result->fetch_array(MYSQLI_NUM);
			if($row[2] != $password){ $returnObj->errorId = 4; }
			else{ $returnObj->id = $row[0]; }
		}
		else{ $returnObj->errorId = 3; }
		mysqli_free_result($result);
	}
	else{ $returnObj->errorId = 1; }
	echo json_encode($returnObj);
	mysqli_close($connect);
?>