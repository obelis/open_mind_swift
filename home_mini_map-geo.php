
	<?php


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
$hash = rand();

?>





<div id="map<?=$hash;?>" class="map" style="width: 100%; height: 395px;"></div>


<script type="text/javascript">

    var locations = [

<?php
echo $location_select;
?>
	
	    ];
	
	var lat<?=$hash;?> = <?php echo json_encode($lat); ?>;
	var lon<?=$hash;?> = <?php echo json_encode($lon); ?>;
	var myCenter<?=$hash;?> = new google.maps.LatLng(lon<?=$hash;?>,lat<?=$hash;?>);
	
    var map<?=$hash;?> = new google.maps.Map(document.getElementById('map<?=$hash;?>'), {
      zoom: 14,
      center: myCenter<?=$hash;?>,
		scrollwheel: true,
		 panControl: true,
		navigationControl: true,
		mapTypeControl: true,
		scaleControl: true,
		draggable: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP     
    });
	
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map<?=$hash;?>
      });
	  
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map<?=$hash;?>, marker);
        }
      })(marker, i));
    }
    
    
    
<?php if (isset($second_phone_number) && $second_phone_number!='' && $map_bounds=='show'){ ?>
        
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
map<?=$hash;?>.fitBounds (bounds);

<?php } ?>

google.maps.event.addDomListener(window, "resize", function() {
    var center = map<?=$hash;?>.getCenter();
    google.maps.event.trigger(map<?=$hash;?>, "resize");
    map<?=$hash;?>.setCenter(center); 
}); 
    
  </script>