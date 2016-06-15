// function deleteBook(){
// 	var id = prompt("Enter ID of announcement below to Delete.");
	

// 	$.post("delete.php", {ID:id}, function(data){

// 			// $('#status').html(data);
// 			alert(data);
// 	});
// }

(function(){





var mapObj = {
		map : new GMaps({
					  el: '#map',
					  lat: 10.642928,
					  lng: -61.398021,
					  zoom: 14
					})
	};


var run = false;
var x;


$(window).resize(function() {
	console.log("resize");
    mapObj.map.refresh();
});

$(document).ready( function(){

	pageSetUp();

});




function pageSetUp(){
	$("#selector").change(changeRoute);
}



function changeRoute(){
	if(run===true){
		run = false;
		stop();
	}
	console.log(run);
	var choice = $(this).val();
	console.log("You chose: "+choice);
	setUpRoute(choice);
}




function setUpRoute(choice){

	var map = mapObj.map;
	map.removePolylines();
	map.removeMarkers();


	var routeid = choice;
	getRouteInfo(routeid);


	$.ajax({
		type: 'GET',
		url: 'server.php',
		data: {'route': routeid},
		success: function(data) {
		  console.log("RETURNED => " + data);
		  var json =  JSON.parse(data);
		  var coordObj = JSON.parse(json[0]);
		  var shuttle = json[1];
		  console.log(shuttle);
		  drawRoute(coordObj);
		  if(shuttle!==null){

	  		startShuttleUpdate(shuttle);

		  }	

		}
	});


	function drawRoute(coords){
		var coordObj = coords;
		console.log(coordObj[0].lat);
		var gps = convert(coordObj);
		map.drawPolyline({
			path: gps,
			strokeColor: '#131540',
			strokeOpacity: 0.6,
			strokeWeight: 6
		});
	}	


	function convert(obj){
		var arr = [];
		$.each(obj, function (index, value){
			arr[index] = [value.lat, value.long]; 
		});
		return arr;
	}


	function getRouteInfo(routeid){
		var route;
		$.get("server.php", {routeinfo : routeid}, function(data){
				route=data;
				console.log(route);
				$("#update").html("<p>"+route+"</p>");
			});
	}

	console.log("heeyyyyyy");

}



function startShuttleUpdate(shuttleid){

	var map = mapObj.map;
	map.addMarker({
	  lat: 10.645431,
	  lng: -61.401458,
	  title: 'Shuttle',
	  icon : "./bus.png",
	  click: function(e){
		alert('Shuttle');
	  }
	});

	run = true;
	getCoords(shuttleid);

}

/*

function getCoords(shuttleid){
	console.log("run:" +shuttleid+ " = " +run );

	x = setTimeout(function(){
			var coords;
			$.get("server.php", {shuttle : shuttleid}, function(data){
				coords = data;
				console.log(coords);
				updateMarker(coords);
			},'json');

			getCoords(shuttleid);
			//console.log(coords);
			//return coords;
		}, 3000);
	if(!run) clearTimeout(x);
	console.log("running:" + shuttleid);
	return;
}*/

function getCoords(shuttleid){
	console.log("running shuttle: " + shuttleid);
	x = setTimeout(function(){
			var coords;
			$.get("server.php", {shuttle : shuttleid}, function(data){
				coords = data;
				console.log(coords);
				updateMarker(coords);
			},'json');

			getCoords(shuttleid);
		}, 3000);
}

function stop(){
	clearTimeout(x);
}


function updateMarker (coords) {          
   	  var obj = coords;
   	  if(mapObj.map.markers[0])   
	  	mapObj.map.markers[0].setPosition(new google.maps.LatLng(obj.lat, obj.long));
}



})(); //end
