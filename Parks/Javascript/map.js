/*
Initialises the map.
*/

var map = L.map('map').setView([-27.59388220, 153.0219380], 12);

L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
	maxZoom: 18,
	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
		'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="http://mapbox.com">Mapbox</a>',
	id: 'examples.map-i875mjb7'
}).addTo(map);

/*
The function to add a marker to the map with the name, URL and correct coordinates.
*/

function add_marker(lat,lon,name,id) {
	var marker = L.marker([lat, lon]).addTo(map);
	marker.bindPopup("<a href='parkpage.php?id="+id+"'>"+name+"</a>").openPopup();
}