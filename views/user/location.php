<script type="text/javascript">
      $("paper-spinner").attr("active","false");
      msnry.destroy()

</script>
<?php
$state = $array['state'];
$location = $array['location'];
    if ($state=="sent")
{
     echo "<script>$('#refresh_button').hide();</script>";

}
else
{
       echo "<script>$('#refresh_button').show();</script>";

}
$location=json_decode($location)->location;
$latitude = $location[0]->latitude;
$longitude = $location[0]->longitude;
// $add=json_decode(file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$latitude.','.$longitude.''))->results;
// $address = $add[0]->formatted_address;



echo "
<google-map disableDefaultUI   latitude=".$latitude." longitude=".$longitude." zoom='18' fit>
  <google-map-marker latitude=".$latitude." longitude=".$longitude.">
     </google-map-marker>
</google-map>";
?>
