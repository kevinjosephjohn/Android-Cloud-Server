
<style type="text/css">
        .card {
        display: inline-block;
        background: white;
        box-sizing: border-box;
        width: 330px;
        height: auto;
        margin: 16px;
        padding: 16px;
        border-radius: 2px;
    }
     bootstrap-label {
display: inline;
padding: .2em .6em .3em;
font-size: 75%;
font-weight: 700;
line-height: 1;
color: #fff;
text-align: center;
white-space: nowrap;
vertical-align: baseline;
border-radius: .25em;
background-color: #009688;
 }
    li {
list-style-type: none;
}

</style>


<?php
$name = $array['name'];
$rand = $array['rand'];

$files = scandir("./audio/".$name."/".$rand."/");
foreach($files as $file) {
    $time=date ("F d Y H:i:s", filemtime("./audio/".$name."/".$rand."/".$file));

    if($file == '.' || $file == '..') continue;
    echo "
       <paper-shadow class='card' z='1'>
<audio preload='none' src='./audio/".$name."/".$rand."/".$file."' type='audio/mp4' controls></audio>
 <bootstrap-label style='float:right; margin-top:4px;'><li>".$time."</li></bootstrap-label>
</paper-shadow>"
;
}


?>
