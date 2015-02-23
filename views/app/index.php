

       <?php echo "<script> function connect() { top.location.href=\"{$url}\";  }</script>"; ?>
<!doctype html>

 
  <body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".header-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?=$hd[0] ?></a>
        </div>
       
       
      </div>
    </div>
    <div class="container">
      <div class="jumbotron">
        <h1><?=$hd[0] ?></h1>
        <p><?=$hd[1] ?></p>
        
        <p><a class="btn btn-primary btn-large" onclick="connect()">Continue &raquo;</a></p>
      </div>
   
      </div>

