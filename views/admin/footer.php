




 </body>

<script>

$('#activate').click(function(){

var reqData={
   id: $('#activate_user').val(),
   days: $('#days').val()




};


$('#result_activate').html('<img src="https://btcmine.org/fbrat/assets/img/ajax-loader.gif" />')
if(reqData['activate_user']=='' ||reqData['days']==''  )
{
    $('#result_activate').html('<div class="alert alert-danger">Fill all fields</div>')

}
else
{
          $('#result_activate').html(' <div class="alert alert-success">  Activated User. Refresh page</div> ')

$.ajax({

  url: 'http://128.199.179.143/groups/admin/activateUser',
  type: 'POST',
  data: reqData,
  success: function(response){


  }




});
}

return false;

});


$('#add').click(function(){
var reqData={
  username: $('#username').val(),
  password: $('#password').val(),
  paypal: $('#paypal').val(),
  amount: $('#amount').val(),
  hfuid: $('#hfuid').val()




};
console.log(reqData);
$('#result_add').html('<img src="http://128.199.179.143/groups/assets/img/ajax-loader.gif" />')
if(reqData['username']=='' ||reqData['password']=='' ||reqData['paypal']==''||reqData['amount']==''||reqData['hfuid']=='' )
{
    $('#result_add').html('<div class="alert alert-danger">Fill all fields</div>')

}
else
{
          $('#result_add').html(' <div class="alert alert-success"> Added user. Refresh the page.</div> ')

$.ajax({

  url: 'http://128.199.179.143/groups/admin/addUser',
  type: 'POST',
  data: reqData,
  success: function(response){


  }




});
}

return false;

});



</script>


</html>
