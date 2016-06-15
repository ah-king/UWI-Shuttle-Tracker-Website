<?php
require('./template.php');

// xampp and usb webserver compatability
 // $db = new mysqli("localhost", "root", "", "map", 3306);
$db = new mysqli("localhost", "root", "usbw", "map", 3307);


if(isset($_POST["shuttle"])){ // idk

	$shuttleid = $_POST['shuttle'];	

	$results = $db->query("SELECT coords FROM route WHERE id = $shuttleid;");

	$row = $results->fetch_assoc();

	$coords = $row["coords"];

	echo $coords;

}


elseif(isset($_GET['shuttle'])){//script.js


	$shuttleid = $_GET['shuttle'];

	$results = $db->query("SELECT coords FROM shuttle WHERE id = $shuttleid;");

	$row = $results->fetch_assoc();

	$coords = $row["coords"];

	echo $coords;


}


elseif( isset($_GET["route"])  ) { //script.js get route coords and route shuttle

	$route = $_GET["route"];

	$results = $db->query("SELECT coords, shuttleid FROM route WHERE id = ". $route .";");

	$row = $results->fetch_assoc();

	$json = array();
	$json[] = $row["coords"];
	$json[] = $row["shuttleid"];


	echo json_encode($json);

}


elseif(isset($_GET['routeinfo'])){//script.js


	$routeid = $_GET['routeinfo'];

	$results = $db->query("SELECT routeinfo FROM route WHERE id = $routeid;");

	$row = $results->fetch_assoc();

	$routeinfo = $row["routeinfo"];

	echo $routeinfo;


}



elseif(isset($_POST["shuttlecoords"])){ //shuttle.js

	$coords = $_POST["shuttlecoords"];
	$id = $_POST["shuttleid"];

	$db->query("UPDATE shuttle SET coords = '$coords' WHERE id = $id;");
	echo $db->error;

}


elseif (isset($_POST["add_coords"])) { //shuttle.js

	$coords = $_POST["add_coords"];
	$db->query("INSERT INTO route (coords) VALUES ('". $coords. "');" );
}


elseif (isset($_POST["submit_route"])) { //addroute.js

	$data = $_POST["submit_route"];
	$routeinfo = $data[0];
	$coords = $data[1];
	$result = $db->query("INSERT INTO route (routeinfo, coords) VALUES ('". $routeinfo . "','". $coords. "');" );
	if($result){
		echo ("Route Successfully Created!");
	}
	else{
		echo $db->error;
	}
}



elseif (isset($_POST["announcement"])) { //announcement.php

	$data = $_POST["announcement"];
	$db->query("INSERT INTO announcement (details) VALUES ('". $data . "');" );
	echo $db->error;
}

elseif (isset($_GET["announcement1"])) { //announcement.php

	// $results = $db->query("SELECT details, date FROM announcement ORDER BY date DESC LIMIT 1;" );
	$results = $db->query("SELECT id, details, date FROM announcement ORDER BY date DESC;" );
	//echo $db->error;
	$row = $results->fetch_assoc();
	$announcements = array();
	while ($row) { // will now pull all results from the announcements table
		$announcements[]=$row;
		$row = $results->fetch_assoc();
	}
	// echo $results['details'] . "<br> Dated: ". $results['date'];
	generateAnnouncements1( $announcements );
}

elseif (isset($_GET["announcement2"])) { //index.php

	// $results = $db->query("SELECT details, date FROM announcement ORDER BY date DESC LIMIT 1;" );
	$results = $db->query("SELECT details, date FROM announcement ORDER BY date DESC;" );
	//echo $db->error;
	$row = $results->fetch_assoc();
	$announcements = array();
	while ($row) { // will now pull all results from the announcements table
		$announcements[]=$row;
		$row = $results->fetch_assoc();
	}
	// echo $results['details'] . "<br> Dated: ". $results['date'];
	generateAnnouncements2( $announcements );
}

elseif (isset($_GET["routes"])) { //addroute.php

	// $results = $db->query("SELECT details, date FROM announcement ORDER BY date DESC LIMIT 1;" );
	$results = $db->query("SELECT `id`,`routeinfo` FROM `route`;" );
	//echo $db->error;
	$row = $results->fetch_assoc();
	$routes = array();
	while ($row) { // will now pull all results from the route table
		$routes[]=$row;
		$row = $results->fetch_assoc();
	}
	// echo $results['details'] . "<br> Dated: ". $results['date'];
	generateRoutes( $routes );
}
	// while ($row) { // will now pull all results from the announcements table
	// 	echo $row['details'] . "<br> Dated: ". $row['date'];
	// 	// $deleteId = $row['id'];
	// 	echo $row['id'];
	// 	// echo "<button class='btn btn-danger' onclick='delete($deleteId);' ><i class='fa fa-trash-o'></i></button>";
	// 	echo "<br><br>";
	// 	$row = $results->fetch_assoc();
	// }


?>