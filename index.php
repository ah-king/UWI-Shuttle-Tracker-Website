<?php

require('template.php');

?>

<!DOCTYPE HTML>

<!--  ----------			This Project was done by:   ---------------
                    AKIN BASCOMBE, ANIESHA SCOTT, AND JASON MUNGAL
                        UNIVERSITY OF THE WEST INDIES SPRING 2016

--------------->

<!--
	Hyperspace by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>UWI Shuttle Tracking System</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />

	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

<!--	        <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

	<style type="text/css">
		#map {
			height: 480px;
			/*width: 600px;*/
		}
		p {
			color: white;
		}
		#heady {
			color: #ffffff;
		}
	</style>

</head>
<body>

<!--Fancy loading-->
<div id="loader-wrapper">
	<div id="loader"></div>

	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>

</div>


<!-- Sidebar -->
<section id="sidebar">
	<div class="inner">
	<div><a href="#intro"><img src="logo2.png" alt="UWI Shuttle Tracker" class="fade-up" style="float:right;width:210px;height:105px;"></a></div><br><br>
		<nav>
			<ul>
				<li><a href="#intro">Announcements</a></li>
				<li><a href="#one">Routes</a></li>
				<li><a href="#two">Track Shuttle</a></li>
				<li><a href="#three">Contact</a></li>
				<li><a href="login.html">Admin Login</a></li>
			</ul>
		</nav>
	</div>
</section>

!-- Wrapper -->
<div id="wrapper">

	<!-- Intro (Announcements goes here?)-->
	<section id="intro" class="wrapper style1 fullscreen fade-up">
		<!--<section id="intro" class="wrapper style3-alt fullscreen fade-up">-->

		<div class="inner" id="updates">
			<div class="jumbotron"><br>
				<h2 id="heady">Welcome to UWI Shuttle Tracker</h2>You can now get shuttle announcements, view route information, track any shuttle or even contact us with feedback!
				<p><br />
					Recent News &amp; Announcements<br>
			
			</p></div>
			<p id = "current_announce">No announcements today</p>

			<script src="./jquery-2.2.2.min.js" ></script>

			<script type="text/javascript">

				$(document).ready(function(){
					$.get('server.php',
						{announcement2 : true},
						function(data){
							console.log(data);
							$("#current_announce").html(data);
						});
				});
			</script>


			<ul class="actions">
				<li><a href="#two" class="button scrolly">Track Shuttles</a></li>
				<li><a href="#one" class="button scrolly">Routes &amp; Schedules</a></li>
				<li><a href="#three" class="button scrolly">Contact Us</a></li>
				<li><a href="login.html" class="button scrolly">Admin Login</a></li>
			</ul>
			<br><br><br><br>
			<!--<br><br><br><br><br><br><br><br><br><br><br>--> <!--filler-->
		</div>

	</section>


	<!-- one ROUTES-->
	<section id="one" class="wrapper fullscreen style4 fade-up">
		<div class="inner">
			<h2>Routes and Schedules</h2>
			<p>Check back here regulary for changes in available routes, schedules, and designated stops</p>
			<div class="features">
				<section>
					<h3>Shuttle Route 2:</h3>
					<p>JFK Underpass -> Wooding Drive -> School of Education -> Old Creative Festival Arts -> Optometry -> Gordon Street -> SAL HALL.
					<br><br>
					*from 7:00pm to 6:00am Students from Santa Margarita, Tunapuna and St Augustine South.<br><br>
					TIME: Weekdays<br><br>
					6:00am to 10:00pm (Every 25 Minutes)<br>
					10:00pm to 6:00am (Every Hour)
					</p>
				</section>
				<section>
					<h3>Shuttle Route 4:</h3>
					<p>
						JFK Underpass -> Curepe -> Joyce Gibson Inniss Hall -> Field Station (Request Only).<br><br>
						*from 6:00pm to 10:00pm San Juan Bus Terminus (Request Only).<br><br>
						TIME: Weekdays<br><br>
						6:00am to 10:00pm (Every 40 Minutes)<br>
						10:00pm to 6:00am (Every Hour)
					</p>
				</section>

			</div>
		</div>
	</section>



	<!-- Two (MAP or ROUTES) -->
	<section id="two" class="wrapper style2 fullscreen fade-up">
		<div class="inner">
			<h2>Track</h2>

			<div class="features">
				<section>
					<!--	Map Selector-->
					<form role="form">
						<div class="form-group">
							<label for="selector">Select Route:</label>
							<select class="form-control" id="selector">
								<option value = "" selected disabled>--Please select--</option>
								<?php echo createRouteList($routes);?>
							</select>
						</div>
					</form>
					<div class id="update"><p>Shuttle Route #, Route Details, Times</p></div>
				</section>

				<!--      Actual Map-->
				<section>
					                                    <div class="image image fit">
					<div id="map"></div>
					<!--                                        <div class id="update"><p>Route details: pick up and drop off, time</p></div>-->
					                                    </div>

					<!--	<button class = "button" onclick="getCoords();">Click Me</button> -->
				</section>

				<!--                                Map LOGIC-->
				<script src="./LABjs-2.0.3/LAB.js" ></script>
				<script>
					$LAB
						.script('http://maps.googleapis.com/maps/api/js').wait()
						.script('./gmaps.js').wait()
						.script('./script.js').wait()
				</script>

				<!--	<section>
                        <span class="icon major fa-cog"></span>
                        <h3>Sed erat ullam corper</h3>
                        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                    </section>
                    <section>
                        <span class="icon major fa-desktop"></span>
                        <h3>Veroeros quis lorem</h3>
                        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                    </section>
                    <section>
                        <span class="icon major fa-chain"></span>
                        <h3>Urna quis bibendum</h3>
                        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                    </section>
                    <section>
                        <span class="icon major fa-diamond"></span>
                        <h3>Aliquam urna dapibus</h3>
                        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                    </section>-->
			</div>
			<!--<ul class="actions">
                <li><a href="#" class="button">Learn more</a></li>
            </ul>-->
		</div>
	</section>

	<!-- Three (Help Section?) -->
	<!--<section id="three" class="wrapper style3 fade-up">-->
	<section id="three" class="wrapper style3 fullscreen fade-up">
		<div class="inner">
			<h2>Get in touch</h2>
			<p> Feedback about our site? Need help with a particular feature?<br>
				Maybe you just want to say
				hello. Don't be afraid to contact us!
			</p>
			<div class="split style1">
				<section>
					<form method="post" action="#">
						<div class="field half first">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" />
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="5"></textarea>
						</div>
						<ul class="actions">
							<li><a href="" class="button submit">Send Message</a></li>
						</ul>
					</form>
				</section>
				<section>
					<ul class="contact">
						<li>
							<h3>Address</h3>
											<span>University of The West Indies<br />
											St, Augustine<br>
											Trinidad and Tobago</span>
						</li>
						<li>
							<h3>Email</h3>
							<a href="#">shuttle@sta.uwi.edu</a>
						</li>
						<li>
							<h3>Phone</h3>
							<span>(868) 662-2002 ext 83510/82120</span>
						</li>
						<li>
							<h3>Social</h3>
							<ul class="icons">
								<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="fa-github"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="fa-linkedin"><span class="label">LinkedIn</span></a></li>
							</ul>
						</li>
					</ul>
				</section>
			</div>
		</div>
	</section>

</div>

<!-- Footer -->
<footer id="footer" class="wrapper style1">
	<div class="inner">
		<ul class="menu">
			<li>&copy; a GroupFIVE Production. All rights reserved.</li><li>Special thanks to: <a href="#">HTML5 UP</a></li>
		</ul>
	</div>
</footer>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<!--<script src="js/main.js"></script>-->


</body>
</html>