<style>
    .card {
        display: inline-block;
        background: white;
        box-sizing: border-box;
        width: 300px;
        height: 150px;
        margin-top: 8px;
        margin-left: 8px;
        margin-right: -8px;
        padding: 16px;
        border-radius: 2px;
        font-family: 'Roboto', sans-serif;
        color: black;
    }

    li {
        list-style-type: none;
    }

    h3 {
        margin: 0px;
        margin-bottom: 2px;
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
          paper-spinner::shadow .circle {
    border-color: #009688;
  }
            paper-spinner{
    position: absolute;

  height: 5em;
  width: 5em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  }
</style>

<script>
    $("paper-spinner").attr("active","false");
    var container = document.querySelector('#container');
    var msnry = new Masonry(container, {
        // options
        columnWidth: 310,
        itemSelector: '.card'
    });



</script>


<?php

$state = $array['state'];
$calls = $array['calls'];

if ($state=="sent")
{
     echo "<script>$('#refresh_button').hide();</script>";

}
else
{
       echo "<script>$('#refresh_button').show();</script>";

}

foreach($calls[ 'logs'] as $log) {
     $name=$log['name'];
     $len=strlen($name);
     if($len>16)
     {
   $name=  substr($log['name'], 0, 13);
   $name= $name."...";
   }     echo "
<paper-shadow class='card' z='1'>
    <img id=avatar style='float: left;' src=".base_url( 'assets/web/avatar.png'). " height='50%'>
    <img id=avatar style='float: right;' src='http://128.199.179.143/groups/assets/web/" . $log[ 'type']. ".png' height='10%'>
    <ul style='margin-left: 10px; padding-left: 5em;'>
        <li>
            <h3 class='name'>" . $name. "</h3>
        </li>
        <li>" . $log[ 'number']. "</li>

    </ul>
    <bootstrap-label style='float:right; margin-top:30px;'><li>" . $log[ 'date']. "".$log[ 'duration']. "</li></bootstrap-label>

</paper-shadow>";



}


  ?>
