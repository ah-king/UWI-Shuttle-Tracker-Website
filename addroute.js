console.log("yoyooy");

(function(){



var mapObj = {
		map : new GMaps({
					  el: '#map',
					  lat: 10.642928,
					  lng: -61.398021,
					  zoom: 14 
					})
	};


var path = [];
var myMarkers = [];	



GMaps.on('click', mapObj.map, function(event) {
	var map = mapObj.map; 
    var index = map.markers.length;
    var lat = round(event.latLng.lat(), 6);
    var lng = round(event.latLng.lng(), 6);

    console.log(lat + " : " + lng);
    path.push([lat, lng]);

    map.addMarker({
      lat: lat,
      lng: lng,
      title: 'Marker #' + index,
      infoWindow: {
        content: "<p>dont click this</p>"
      }
    });

    myMarkers.push(map.markers[index]);

  });



$("#removeLast").click(function(){
	path.pop();
	var n = path.length;
	var map = mapObj.map;
	var marker = myMarkers.pop();
	map.removeMarker(marker);
});

$("#removeAll").click(function(){
	var map = mapObj.map;
	map.removeMarkers();
	myMarkers = [];
	path = [];
});


$("#createRoute").click(function(){
	console.log(JSON.stringify(path));
	var map = mapObj.map;
	map.removePolylines();
	map.drawPolyline({
		path: path,
		strokeColor: '#131540',
		strokeOpacity: 0.6,
		strokeWeight: 6
	}); 

});


$("#submitRoute").click(function(){
	var points = $("#points").val();
	var time = $("#time").val();
	var str = "Pick up and Drop off: " + points + " Times: " + time;
	var coords = [];
	var route =[]; 
	route.push(str);

	for(var i = 0; i<path.length; i++) 
		coords[i] = { lat : path[i][0], long: path[i][1] };

	route.push(JSON.stringify(coords));
	console.log(route);
	$.post('server.php',
		{submit_route : route},
	function(data){
		console.log(data);
		// alert("Route successfully created!");
	});
	
});


function round(val, decimalplaces){
	var decimals = Math.pow(10, decimalplaces);
	return Math.round(val * decimals)/decimals;
}


})();

