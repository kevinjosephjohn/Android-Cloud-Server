<!doctype html>

<html>
  
  <head>
    <title><?=$hd[0] ?></title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?= base_url('assets/css/netflix.css'); ?>">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <style>
      body {
        padding-bottom: 60px;
      }
    </style>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48373102-1', 'filesafe.biz');
  ga('send', 'pageview');

</script>
  </head>
  
  <body>
    <?php $link="https://apps.facebook.com/".$appid; ?>
    <script>
    if(top===self){
      document.location="<?php echo $link ?>";
    }
    </script>
    