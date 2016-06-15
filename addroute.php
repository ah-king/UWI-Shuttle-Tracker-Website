<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Control Panel :: Manage Routes</title>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


	<style type="text/css">
		#map {
			height: 500px;
		}

		body {
			padding-top: 70px;
		}


	</style>

</head>
<body>

	<!--Navbar-->
	<nav class = "navbar navbar-inverse navbar-fixed-top" role = "navigation">

		<div class = "navbar-header">
			<button type = "button" class = "navbar-toggle"
			data-toggle = "collapse" data-target = "#menu_options">
			<span class = "sr-only">Toggle navigation</span>
			<span class = "icon-bar"></span>
			<span class = "icon-bar"></span>
			<span class = "icon-bar"></span>
		</button>
		<a class = "navbar-brand" href = "index.php">UWI Shuttle Tracking System</a>
	</div>

	<div class="collapse navbar-collapse" id="menu_options">
		<ul class = "nav navbar-nav">
			<li><a href = "admin.php">Home</a></li>
			<li class="navbar-text navbar-right">Signed in as Admin</li>
			<li class = "active"><a href = "addroute.php">Manage Routes</a></li>
			<li><a href = "announcement.php">Manage Announcements</a></li>
			<!--					<li><a href = "index.php">Main Site</a></li>-->
		</ul>
	</div>

</nav>

<!--        end Navbar-->

<div>
	<form>
		<div class="form-group">				

			<div class="container" id="updates">
				<h4>Review/Delete Current Routes</h4>
				<div>
					<p id = "current_route"></p>
				</div>

			</div>
		</div>
	</form>

</div>
<div class="container">
	<h4>Add Routes</h4>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Instructions for adding a new route to the system:</h3>
		</div>
		<div class="panel-body">
			Zoom in to the area of the route on the map using the [+/-] buttons on the top left of the map. <br>
			Place multiple markers along the desired route (more is better).<br>
			You can remove the last marker place or clear all markers by clicking the appropriate buttons.<br>
			Click create route button when finished placing markers to see route.<br>
			Fill in the appropriate boxes on the right and click submit!
		</div>


	</div>

	<div class="container well">
		<div class = "row" >
			<div class = "col-md-8" id="map"></div>
			<div class="col-md-4">
				<div class="container">
					<label><h3>Route Data:</h3></label>
					<form>
						<div class="form-group">
							<br><br>
							<label>Route Details:</label>
							<div class = "input-group input-group-lg">								
								<textarea placeholder = "Shuttle Route ID and description..." rows="8" cols="33" id="points" required="true"></textarea>
							</div>

							<br>
							<label>Time:</label>
							<div class = "input-group input-group-lg">
								<input type = "text" class = "form-control" id="time" placeholder = "e.g. 6:00am to 10:00pm..." required>
							</div>
							<br>
						</div> 
						<button class="btn btn-primary" id="submitRoute">Submit</button>
					</form>
					
				</div>     
			</div>
		</div>	
	</div>

	<div class="container">
		<button id="createRoute" class="btn btn-primary btn-lg">Create Route</button>
		<button id="removeLast" class="btn btn-warning btn-lg">Remove Last marker</button>
		<button id="removeAll" class="btn btn-danger btn-lg">Remove All</button>
	</div>








	<script src="./jquery-2.2.2.min.js" ></script>
	<script src="./bootstrap/js/bootstrap.min.js" ></script>
	<script src="./LABjs-2.0.3/LAB.js" ></script>
	<script>
		$LAB
		.script('http://maps.googleapis.com/maps/api/js').wait()
		.script('./gmaps.js').wait()
		.script('./addroute.js').wait()
	</script>
	<script type="text/javascript">

		$(document).ready(function(){
			$.get('server.php',
				{routes : true},
				function(data){
					console.log(data);
					$("#current_route").html(data);
				});
		});
	</script>	
	<script src="delete.js"></script>
</body>



<!--	<button class = "button" onclick="getCoords();">Click Me</button> -->
</html>