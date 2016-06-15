<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Control Panel :: Manage Announcements</title>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style type="text/css">
		body {
			padding-top: 70px;
			padding-left: 32px;
			padding-right: 10px;
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

			<!-- //would include both adding and deleting of announcements -->
			<li><a href = "addroute.php">Manage Routes</a></li>
			<!-- <li><a href = "#">Delete Route</a></li> -->
			<!-- <li><a href = "#">Assign Shuttles</a></li> -->
			<!-- // would include both adding and deleting announcements -->
			<li class = "active"><a href = "announcement.php">Manage Announcements</a></li>
			<!--					<li><a href = "index.php">Main Site</a></li>-->
		</ul>
	</div>

</nav>

<!--        end Navbar-->

<!-- <div class="container"> -->
<div id="skills" class="row">
	<div>
		<form>
			<div class="form-group">				
				
				<div class="container" id="updates">
					<h4>Review Current Announcements</h4>
					<div>
						<p id = "current_announce"></p>
					</div>
					
				</div>
			</div>
		</form>
		
	</div>
	<div id="status"></div>
	<div class="container">
		<form>
			<div class="form-group">
				<label>Enter New Announcement:</label><br>
				<textarea rows="5" cols="80" id="announcement" required></textarea><br>
				<button id="btn_submit" type="submit" class="btn btn-primary btn-lg">Submit</button>
			</div>
		</form>
		
	</div>
</div>
<!-- </div>container div -->







<script src="./jquery-2.2.2.min.js" ></script>
<script src="./bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript">
	
	$("#btn_submit").click(function(){
		var announce = $("#announcement").val();
		$.post('server.php',
			{announcement : announce},function(data){
				alert(data);
			})
	});
</script>
<script type="text/javascript">
	
	$(document).ready(function(){
		$.get('server.php',
			{announcement1 : true},
			function(data){
				console.log(data);
				$("#current_announce").html(data);
			});
	});
</script>	
<script src="delete.js"></script>
</body>



<!--	<button class = "button" onclick="getCoords();">Click Me</button> -->
</html>