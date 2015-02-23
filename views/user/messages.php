<style>
    .card {
        display: inline-block;
        background: white;
        box-sizing: border-box;
        width: 300px;
        margin-top: 8px;
        margin-left: 8px;
        padding: 16px;
        border-radius: 2px;
        font-family: 'Roboto';
        color: black;
        height: auto;
    }
    li {
        list-style-type: none;
    }
    h3 {
        margin: 0px;
        margin-bottom: 4px;
    }
    bootstrap-label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        color: #fff;
        text-align: center;
        border-radius: .25em;
        background-color: #009688;
        float: right;
        margin-top: 10px;
    }
    .h5-custom {
        font-family: 'Roboto';
        font-size: 0.83em;
        margin-before: 1.67em;
        margin-after: 1.67em;
        margin-start: 0px;
        margin-end: 0px;
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
$messages = $array['messages'];
    if ($state=="sent")
{
     echo "<script>$('#refresh_button').hide();</script>";
    
}
else
{
       echo "<script>$('#refresh_button').show();</script>";
  
}

foreach($messages['messages'] as $log) { 

echo "
<paper-shadow class='card' z='1'>
    <img id=avatar style='float: right; height:20px;'  src='http://128.199.179.143/groups/assets/web/" . $log[ 'Type']. ".png' >

    <li>
        <h3 class='name'>" . $log['Name']. "</h3>
    </li>

    <hr>
    <li class='h5-custom'>" . $log['Message']. "</li>
    <bootstrap-label>" . $log['Date']. "</bootstrap-label>
</paper-shadow>"; } ?>
