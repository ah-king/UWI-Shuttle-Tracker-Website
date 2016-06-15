<?php



// xampp and usb webserver compatability
  // $db = new mysqli("localhost", "root", "", "map", 3306);
$db = new mysqli("localhost", "root", "usbw", "map", 3307);

$results = $db->query("SELECT id FROM route ORDER BY id ASC;");


$row = $results->fetch_assoc();

$routes = array();

while($row){
	$routes[] = $row["id"];
	$row = $results->fetch_assoc();
}


//echo createRouteList($routes);


function createRouteList($routes){
	$list="";
	foreach ($routes as $r) {
		$list .= "<option". ' value="'.$r.'"' . ">Route $r </option>";
	}
	return $list;
}

function generateRoutes($tableData ){ 
	// addroute.php

	// opening table tag
	echo '<table class="table table-bordered table-hover">';
	echo '<tr>
	<th>ID</th>
	<th>Details</th>
	<th>Actions</th>
</tr>';
	echo "<tbody>";
	//first loop to go through our array
	foreach ($tableData as $key1 => $row) {
		// open row tags
		echo "<tr id='row$key1'>";
		// second loop for arrays contained inside first array
		foreach ($row as $key2 => $rowdata) {
			echo "<td>$rowdata</td>";
		}
		// $rowid1 = $key1;
		$rowid = $row['id'];
		echo "<td>";
		echo "<button class='btn btn-danger' onclick='deleteRoute($rowid);' ><i class='fa fa-trash-o'></i></button>";
		echo "</td>";

		// close row tags
		echo "</tr>";
	}
	echo "</tbody>";
	//closing table tag
	echo '</table>';

}

function generateAnnouncements1($tableData ){ 
	// announcement.php

	// opening table tag
	echo '<table class="table table-bordered table-hover">';
	echo '<tr>
	<th>ID</th>
	<th>Details</th>
	<th>Date</th>
	<th>Actions</th>
</tr>';
	echo "<tbody>";
	//first loop to go through our array
	foreach ($tableData as $key1 => $row) {
		// open row tags
		echo "<tr id='row$key1'>";
		// second loop for arrays contained inside first array
		foreach ($row as $key2 => $rowdata) {
			echo "<td>$rowdata</td>";
		}
		// $rowid1 = $key1;
		$rowid = $row['id'];
		echo "<td>";
		echo "<button class='btn btn-danger' onclick='deleteBook($rowid);' ><i class='fa fa-trash-o'></i></button>";
		echo "</td>";

		// close row tags
		echo "</tr>";
	}
	echo "</tbody>";
	//closing table tag
	echo '</table>';

}

//For the students page
function generateAnnouncements2($tableData ){

	// opening table tag
	echo '<table class="table table-bordered table-hover">';
	echo '<tr>
	<th>Details</th>
	<th>Date</th>
	
</tr>';
	echo "<tbody>";
	//first loop to go through our array
	foreach ($tableData as $key1 => $row) {
		// open row tags
		echo "<tr id='row$key1'>";
		// second loop for arrays contained inside first array
		foreach ($row as $key2 => $rowdata) {
			echo "<td>$rowdata</td>";
		}

		// close row tags
		echo "</tr>";
	}
	echo "</tbody>";
	//closing table tag
	echo '</table>';

}



?>

