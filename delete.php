<?php

if(isset($_POST["ID"])){

	$delId = $_POST["ID"];
// xampp and usb webserver compatability
 // $db = new mysqli("localhost", "root", "", "map", 3306);
	$db = new mysqli("localhost", "root", "usbw", "map", 3307);

	$sql = "DELETE FROM announcement where id = '$delId';";

	$result = $db->Query($sql);

	if($result){
		echo "Successfully Deleted!";
	}
	else {
		echo "Incorrect ID. Please try again.";
	}
}
elseif (isset($_POST["IDR"])){
	$delId2 = $_POST["IDR"];

// xampp and usb webserver compatability
 // $db = new mysqli("localhost", "root", "", "map", 3306);
	$db = new mysqli("localhost", "root", "usbw", "map", 3307);

	$sql = "DELETE FROM route where id = '$delId2';";

	$result = $db->Query($sql);

	if($result){
		echo "Successfully Deleted!";
	}
	else {
		echo "Incorrect ID. Please try again.";
	}
}
?>