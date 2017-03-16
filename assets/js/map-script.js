$(document).ready(function(){
	$("#fire-department, #police-station, #efcc-office, #ndlea-office, #lastma-office, #lasema-office,#hospital").on("click", function(e){
		e.preventDefault();
		var address = $(this).data("address");
		var station_name = $(this).data("name");
		var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + address + "&key=AIzaSyBDiZor9pRFXVMz5Ala4rmDLeS89_ul1z4";
		$("#address-waiting").show();
		$.get(url, function(data){
			// data = JSON.parse(data);
			console.log(data.results);
			results = data.results;
			lat = results[0].geometry.location.lat;
	        lng = results[0].geometry.location.lng;
	        // console.log("lat=" + lat + " AND long=" + lng);
	        

	        $(".map-holder").html("<img src='https://maps.googleapis.com/maps/api/staticmap?center=" + address + "&zoom=14&size=400x400&key=AIzaSyBDiZor9pRFXVMz5Ala4rmDLeS89_ul1z4' class='img-responsive'>");
	        $(".message-alert").text("Here is the closest " + station_name + " to you.");
	        $("#address-waiting").hide();
		});
	});

	$("#get-location-button").on("click", function(e){
		$("#address-waiting").show();
		getLocation();
		
	});


});

function getLocation() {
    if (navigator.geolocation) {
    	console.log("getting location...");
        navigator.geolocation.getCurrentPosition(showPosition, showError, {enableHighAccuracy:true});
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
	console.log("showing position...");
    console.log( "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude); 
    var lat = position.coords.latitude;
    var long = position.coords.longitude;
    var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&key=AIzaSyBDiZor9pRFXVMz5Ala4rmDLeS89_ul1z4";
    $.get(url, function(data){
		// data = JSON.parse(data);
		// console.log(data.results);
		results = data.results;
		console.log(results[0].formatted_address);
        console.log("location retrieved..");
        $("#address-input").val(results[0].formatted_address);
        $("#address-waiting").hide();
        $("#location-gotten").html("We are done getting your location");
	});
}

function showError(){

}