<?php

require('template.php');

?>
<!doctype html>
	<head>
		<meta charset="utf-8">
		<title>Control Panel</title>
		<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
		<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		
		<style type="text/css">
		    #map {
		      height: 300px;
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
					<li class = "active"><a href = "admin.php">Home</a></li>
					<li class="navbar-text navbar-right">Signed in as Admin</li>
					<!--                      Filler-->
					<li class="navbar-text navbar-right"> </li>
					<li class="navbar-text navbar-right"> </li>
					<li class="navbar-text navbar-right"> </li>
					<li class="navbar-text navbar-right"> </li>
					<li class="navbar-text navbar-right"> </li>
					<li class="navbar-text navbar-right"> </li>
					<!-- //would include both adding and deleting of announcements -->
					<li><a href = "addroute.php">Manage Routes</a></li>
					<!-- <li><a href = "#">Delete Route</a></li> -->
					<!-- <li><a href = "#">Assign Shuttles</a></li> -->
					<!-- // would include both adding and deleting announcements -->
					<li><a href = "announcement.php">Manage Announcements</a></li>
<!--					<li><a href = "index.php">Main Site</a></li>-->
				</ul>
			</div>

		</nav>
<!--		End NavBar-->

        <!--			Jumbotron-->
        <div class="container">
            <div class="jumbotron">
                <h1>Welcome to the Control Panel</h1>

                <p>Here you can track the shuttle<br>
                    Add routes.<br>
                    You can also make anouncements for student to see as well deleting old ones</p>
            </div>


        </div>

			<div class="container">
				<form role="form">
					<div class="form-group">
						<label for="selector">Select Route:</label>
						<select class="form-control" id="selector">
						<option value = "" selected disabled>--Please select--</option>
						<?php echo createRouteList($routes);?>
						</select>
					</div> 
				</form>
			</div>     


			<div class="container">	
				<div class = "row well">
					<div class = "col-md-8" id="map"></div>
					<div class ="col-md-4" id="update"><p>Route details: pick up and drop off, time</p></div>
				</div>	
			</div>	







			
			<script src="./jquery-2.2.2.min.js" ></script>
			<script src="./bootstrap/js/bootstrap.min.js" ></script>
			<script src="./LABjs-2.0.3/LAB.js" ></script>
			<script>
				$LAB
				.script('http://maps.googleapis.com/maps/api/js').wait()
				.script('./gmaps.js').wait()
				.script('./script.js').wait()
			</script>	
				
		</body>

		
		
	<!--	<button class = "button" onclick="getCoords();">Click Me</button> -->
</html>