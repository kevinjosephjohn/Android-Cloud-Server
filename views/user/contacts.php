<style>
    .card {
        display: inline-block;
        background: white;
        box-sizing: border-box;
        width: 250px;
        margin-top: 8px;
        margin-left: 8px;
        margin-right: -8px;
        padding: 16px;
        border-radius: 2px;
        font-family: 'Roboto';
        color: black;
        height: auto;
    }
    li {
        list-style-type: none;
        margin-left: 10px;
    }
    h3 {
        margin: 0px;
        margin-bottom: 4px;
    }
    input {
        display: block
    }
</style>


<script>
    $("paper-spinner").attr("active","false");
    var container = document.querySelector('#container');
    var msnry = new Masonry(container, {
        // options
        columnWidth: 260,
        itemSelector: '.card'
    });



</script>

 <?php 
$state = $array['state'];
$contacts = $array['contacts'];
if ($state=="sent")
{
     echo "<script>$('#refresh_button').hide();</script>";
    
}
else
{
       echo "<script>$('#refresh_button').show();</script>";
  
}


foreach($contacts['contacts'] as $log) {
    $name=  substr($log['Name'], 0, 14);
    $len=strlen($name);
    echo"
    <paper-shadow class='card' z='1'>
    <li>
        <h3>" . $name ."</h3>
    </li>
    <hr>";
      
    $i = 1;
    
    while(!empty($log['Phone'.$i]))
    {
    echo "<li>" . $log['Phone'.$i]."</li>";
    $i = $i+1;
    }
   
        
        
    
   
echo"</paper-shadow>";
}
?>

