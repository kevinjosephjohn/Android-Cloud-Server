<body style="background-color:#009688;">

    <paper-shadow class="card">
       
<form is="ajax-form" action="http://128.199.179.143/groups/home/login" method="post" accept-charset="utf-8" headers='{"Login": "login"}'>
    


        <paper-input-decorator label="username">
            <input is="core-input" class="form-control" type="text" name="username" >
        </paper-input-decorator>
       
        <paper-input-decorator label="password">
            <input is="core-input" class="form-control" type="password" name="password">
        </paper-input-decorator>
        <BR>
       <paper-button id="submitButton" style="text-align:center;" raised class="colored" type="submit" value="Login" name="login" >Login</paper-button>
         
    </paper-shadow>
    
    <input type="hidden" name="login" value="">

    </form>

</body>

      <script>
   document.getElementById('submitButton').addEventListener('click', function() {
        document.forms[0].login.value = "Login";
      document.forms[0].submit(); 
   });
          $(document).keypress(function(e) {
    if(e.which == 13) {
        document.forms[0].login.value = "Login";
      document.forms[0].submit(); 
        
    }
});
</script>
