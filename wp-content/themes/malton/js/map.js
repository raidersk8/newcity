if($('#map').length) {
	google.maps.event.addDomListener(window, 'load', initMapJs);
}
        
function initMapJs() {
	var mapElement = document.getElementById('map');
	
	var $map = $(mapElement);
	
	var placemark = $map.attr('placemark');
	var lat = $map.attr('lat');
	var lng = $map.attr('lng');
	var placemarkWidth = parseInt($map.attr('placemark-width'));
	var placemarkHeight = parseInt($map.attr('placemark-height'));
	
	var mapOptions = {
		// How zoomed in you want the map to start at (always required)
		zoom: 16,
		maxZoom: 18,
		scrollwheel: false,
		// The latitude and longitude to center the map (always required)
		center: new google.maps.LatLng(lat, lng),
		disableDefaultUI: true,
		// How you would like to style the map. 
		// This is where you would paste any style found on Snazzy Maps.
		styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#000000"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":"-39"},{"lightness":"35"},{"gamma":"1.08"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"saturation":"0"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"10"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"saturation":"-100"},{"lightness":"-14"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"10"},{"gamma":"2.26"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"saturation":"-100"},{"lightness":"-3"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"54"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":"-100"},{"lightness":"-7"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.local","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"-2"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"saturation":"-100"},{"lightness":"100"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"saturation":"-100"},{"lightness":"-100"}]}]
	};
	
	// Create the Google Map using our element and options defined above
	var map = new google.maps.Map(mapElement, mapOptions);

	// Let's also add a marker while we're at it
	var image = {
		url: placemark,
		// This marker is 20 pixels wide by 32 pixels high.
		size: new google.maps.Size(placemarkWidth, placemarkHeight),
		// The origin for this image is (0, 0).
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(0, placemarkHeight)
	  };
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(lat, lng),
		map: map,
		title: 'pub 102',
		icon: image,
	});
}