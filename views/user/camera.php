<!--custom styles-->


<style>
    .card {
        display: inline-block;
        background: white;
        box-sizing: border-box;
        width: 300px;
        height: auto;
        margin: 16px;
        padding: 16px;
        border-radius: 2px;
    }
  .image{
    max-height:100%;
    max-width:100%;
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
<!--custom scripts-->


<?php
header('Content-Type: image/jpeg');

$name = $array['name'];
$rand = $array['rand'];
$files = scandir("./camera/".$name."/".$rand."/");
foreach($files as $file) {
    $time=date ("F d Y H:i:s", filemtime("./camera/".$name."/".$rand."/".$file));
    $filename = str_replace('_', ' ', $file);
    $filename= explode('.',$filename);
    $filename = $filename[0];
    if($file == '.' || $file == '..') continue;
    echo "
<paper-shadow class='card' z='1'>
    <a href='./camera/".$name."/".$rand."/".$file."' data-lightbox='gallery'>
        <img class='image' src='./camera/".$name."/".$rand."/".$file."'/></a>
        <bootstrap-label style='float:right; margin-top:4px;'><li>".$filename."</li></bootstrap-label>
    </paper-shadow>";
}


?>
