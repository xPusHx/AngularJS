<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "angular_js";

$id = $_GET['id'];
$return_obj = (object) array(you=>0, user_exists=>0);
$username = '';

$connect = mysqli_connect($server, $user, $pass, $db) or die("Couldn't connect to SQL Server on $server");

$result = "SELECT * FROM angular_js_users WHERE id='$id'";
if($result = mysqli_query($connect, $result)){
	$rowcount = mysqli_num_rows($result);
	if($rowcount != 0){
		$return_obj->user_exists = 1;
		$row = $result->fetch_array(MYSQLI_NUM);
		$username = $row[1];
		if($row[0] == $_COOKIE['id'] and $row[1] == $_COOKIE['login'] and $row[2] == $_COOKIE['password']){ $return_obj->you = 1; }
	}
	echo '<script type="text/javascript"> var profile_data = '.json_encode($return_obj).'; </script>';
	mysqli_free_result($result);
}
mysqli_close($connect);
?>