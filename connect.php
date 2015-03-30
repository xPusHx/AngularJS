<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "angular_js";

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	@$login = $request->login;
	@$password = $request->password;

	$return_obj = (object) array('login_error'=>true, 'password_error'=>true, 'login'=>$login, 'password'=>$password);

	$connect = mysqli_connect($server, $user, $pass, $db) or die("Couldn't connect to SQL Server on $server");

	$result = "SELECT * FROM angular_js_users WHERE login='$login'";
	if($result = mysqli_query($connect, $result)){
		$rowcount = mysqli_num_rows($result);
		if($rowcount != 0){
			$return_obj->login_error = false;
			$row = $result->fetch_array(MYSQLI_NUM);
			if($row[2] == $password){
				$return_obj->password_error = false;
			}
		}
		echo json_encode($return_obj);
		mysqli_free_result($result);
	}
	mysqli_close($connect);
?>