
	<?php

include 'location_variables.php';
$address1 = $main_street.', '.$main_city.' '.$main_state.' '.$main_zip;
$address2 = ($display_2_location == 1) ? $second_street.', '.$second_city.' '.$second_state.' '.$second_zip : NULL;
$address3 = ($display_3_location == 1) ? $third_street.', '.$third_city.' '.$third_state.' '.$third_zip : NULL;
$address4 = ($display_4_location == 1) ? $fourth_street.', '.$fourth_city.' '.$fourth_state.' '.$fourth_zip : NULL;
 
//$array = lookup($address1);
//$lat1 = $array[latitude];
//$lon1 = $array[longitude];
$lat1 = get_option( 'lat1' );
$lon1 = get_option( 'lon1' );
								
/*
$array = lookup($address2);
$lat2 = (isset($array[latitude]) ? $array[latitude] : NULL);
$lon2 = (isset($array[longitude]) ? $array[longitude] : NULL);
*/
$lat2 = get_option( 'lat2' );
$lon2 = get_option( 'lon2' );

/*
$array = lookup($address3);
$lat3 = (isset($array[latitude]) ? $array[latitude] : NULL);
$lon3 = (isset($array[longitude]) ? $array[longitude] : NULL);
*/
$lat3 = get_option( 'lat3' );
$lon3 = get_option( 'lon3' );

$lat4ck = get_option( 'lat4' );
$lon4ck = get_option( 'lon4' );
// $array = lookup($address4);
$lat4 = (isset($lat4ck) && $lat4ck != '' ? $lat4ck : NULL);
$lon4 = (isset($lon4ck) && $lon4ck != '' ? $lon4ck : NULL);

/*
$lat4 = get_option( 'lat4' );
$lon4 = get_option( 'lon4' );
*/

$location_count = array();
if (isset($main_phone_number) && $main_phone_number!=''){$location_count[] = $main_phone_number;}
if (isset($second_phone_number) && $second_phone_number!=''){$location_count[] = $second_phone_number;}
if (isset($third_phone_number) && $third_phone_number!=''){$location_count[] = $third_phone_number;}
if (isset($fourth_phone_number) && $fourth_phone_number!=''){$location_count[] = $fourth_phone_number;}
if (isset($fifth_phone_number) && $fifth_phone_number!=''){$location_count[] = $fifth_phone_number;}
if (isset($sixth_phone_number) && $sixth_phone_number!=''){$location_count[] = $sixth_phone_number;}
$location_count_result = count($location_count); 


$lon_sum = $lon1 + $lon2 + $lon3 + $lon4;
$lon_avg = $lon_sum / $location_count_result;

$lat_sum = $lat1 + $lat2 + $lat3 + $lat4;
$lat_avg = $lat_sum / $location_count_result;
/*
echo 'lat1= '.$lat1.'<br />';
echo 'lat2= '.$lat2.'<br />';
echo 'lat3= '.$lat3.'<br />';
echo 'lat4= '.$lat4.'<br />';
echo 'lat avg= '.$lat_avg.'<br /><br />';

echo 'lon1= '.$lon1.'<br />';
echo 'lon2= '.$lon2.'<br />';
echo 'lon3= '.$lon3.'<br />';
echo 'lon4= '.$lon4.'<br />';

echo 'lon avg= '.$lon_avg.'<br />';


echo $location_count_result.'<br />';

echo $address1.'<br />';
echo $address2.'<br />';
echo $address3.'<br />';
echo $address4.'<br />';
*/

$bound2 = (isset($address2) ? ', new google.maps.LatLng ('.json_encode($lon2).','.json_encode($lat2).')' : NULL);
$bound3 = (isset($address3) ? ', new google.maps.LatLng ('.json_encode($lon3).','.json_encode($lat3).')' : NULL);
$bound4 = (isset($address4) ? ', new google.maps.LatLng ('.json_encode($lon4).','.json_encode($lat4).')' : NULL);

?>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCJIUm-gWhV6ryPy1bqfiCz4cQ1ZuB-okc&sensor=false"></script>


<div id="map" style="width: 100%; height: 395px;"></div>


<script type="text/javascript">

    var locations = [
		['<?php echo '<span style=\"font-weight:bold;\">'.$main_street.'</span><br />'.$main_city.', '.$main_state.' '.$main_zip; ?>', <?php echo json_encode($lon1); ?>, <?php echo json_encode($lat1); ?>],
		
		['<?php echo '<span style=\"font-weight:bold;\">'.$second_street.'</span><br />'.$second_city.', '.$second_state.' '.$second_zip; ?>', <?php echo json_encode($lon2); ?>, <?php echo json_encode($lat2); ?>],
		
		['<?php echo '<span style=\"font-weight:bold;\">'.$third_street.'</span><br />'.$third_city.', '.$third_state.' '.$third_zip; ?>', <?php echo json_encode($lon3); ?>, <?php echo json_encode($lat3); ?>],
		
		
		['<?php echo '<span style=\"font-weight:bold;\">'.$fourth_street.'</span><br />'.$fourth_city.', '.$fourth_state.' '.$fourth_zip; ?>', <?php echo json_encode($lon4); ?>, <?php echo json_encode($lat4); ?>],
	
	



    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      /* zoom: 14, */
      /* center: new google.maps.LatLng(<?php echo json_encode($lon_avg); ?>, <?php echo json_encode($lat_avg); ?>), */
      mapTypeId: google.maps.MapTypeId.ROADMAP     
    });
	
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
	  
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    
    
    
        
    //  Make an array of the LatLng's of the markers you want to show
var LatLngList = new Array (new google.maps.LatLng (<?php echo json_encode($lon1); ?>, <?php echo json_encode($lat1); ?>)<?php echo $bound2.$bound3.$bound4; ?> );
//  Create a new viewpoint bound
var bounds = new google.maps.LatLngBounds ();
//  Go through each...
for (var i = 0, LtLgLen = LatLngList.length; i < LtLgLen; i++) {
  //  And increase the bounds to take this point
  bounds.extend (LatLngList[i]);
  
}

//  Fit these bounds to the map
map.fitBounds (bounds);
    
// google.maps.event.addDomListener(window, 'resize', initialize);
// google.maps.event.addDomListener(window, 'load', initialize);
   
    
  </script>