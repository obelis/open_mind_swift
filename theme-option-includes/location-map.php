<?php
$company_name = of_get_option('company_name');	

// $array = lookup($address);
// $lat = $array[latitude];
// $lon = $array[longitude];




?>
		
		
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCJIUm-gWhV6ryPy1bqfiCz4cQ1ZuB-okc&sensor=false"></script>

<script>
var lat = <?php echo json_encode($lat); ?>;
var lon = <?php echo json_encode($lon); ?>;
var myCenter=new google.maps.LatLng(lon,lat);
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();


function initialize(){
  directionsDisplay = new google.maps.DirectionsRenderer();

var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
 
  
var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:'<?php echo '<h4>'.$company_name.'</h4>'.$bubble; ?>'
  });

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });

  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directions-panel'));
 var control = document.getElementById('control');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
}

function calcRoute() {
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var request = {
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

google.maps.event.addDomListener(window, 'resize', initialize);
google.maps.event.addDomListener(window, 'load', initialize);


</script>

  
  
<div id="googleMap" style="width:100%;height:395px;"></div>

<div id="control">
  <input id="end" type="hidden" value="<?php echo $address; ?>">
 <!--  <strong>Your Addreess:</strong> -->
  <input id="start" type="textbox" style="box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);">
  <input type="button" value="Get Directions" onclick="calcRoute();">
</div>  

<div id="directions-panel"></div>
