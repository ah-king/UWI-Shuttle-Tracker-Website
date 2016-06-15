<?php

// xampp and usb webserver compatability
 // $db = new mysqli("localhost", "root", "", "map", 3306);
$db = new mysqli("localhost", "root", "usbw", "map", 3307);


$email=$_POST['email1'];
$password= sha1($_POST['password1']);

$result = $db->query("SELECT * FROM registration WHERE email='$email' AND password='$password'");
$data = $result->num_rows;
if($data==1){
		// echo "ID " . $results->insert_id;
	echo "Successfully Logged in...";
		// header("Location: admin.php");
}else{
	echo "Email or Password is incorrect";
}
// }
// mysql_close ($connection);



?>