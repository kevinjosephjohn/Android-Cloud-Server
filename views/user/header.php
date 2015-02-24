<!doctype html>
<html>

<head>


    <link rel="import" href="<?= base_url('assets/web/bower_components/core-elements/core-elements.html')?>">
    <link rel="import" href="<?= base_url('assets/web/bower_components/paper-elements/paper-elements.html')?>">
    <link rel="import" href="<?= base_url('assets/web/bower_components/google-map/google-map.html')?>">






    <script src="<?= base_url('assets/web/jquery-1.11.2.min.js')?>"></script>
    <script src="<?= base_url('assets/web/bower_components/webcomponentsjs/webcomponents.js')?>"></script>
    <script src="<?= base_url('assets/web/masonry.pkgd.min.js')?>"></script>
      <link href="<?= base_url('assets/css/lightbox.css')?>" rel="stylesheet" />
    <script src="<?= base_url('assets/js/lightbox.min.js')?>"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=yes">
    <style shim-shadowdom>
        paper-progress::shadow #activeProgress {
      background-color: #2196F3;
    }
        paper-progress::shadow #progressContainer {
  background-color: #eee;
}

        core-item {
            color: black;
            font-family: 'Roboto', sans-serif;
        }

        .core-selected {
            color: #009688;
        }

        core-toolbar {
            background-color: #009688;
        }

        core-submenu {
            font-family: 'Roboto', sans-serif;
        }

        .custom /deep/::-webkit-input-placeholder {
            /* platform specific rules for placeholder text */

            color: white;
        }

        .custom /deep/::-moz-placeholder {
            color: white;
        }

        .custom /deep/:-ms-input-placeholder {
            color: white;
        }

        .custom /deep/ .unfocused-underline {
            /* line color when the input is unfocused */

            background-color: transparent;
        }

        .custom /deep/ .focused-underline {
            /* line color when the input is focused */

            background-color: transparent;
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

    <script language="javascript">
        $(function () {
            var lol;
            $(".calllogs").click(function () {
                $("#progress").show();
                lol = $(this).parent().attr("id");
                lol = lol.trim().replace(/ /g, '%20');
                console.log(lol);

                document.getElementById('title').innerHTML = "Call Logs";

                $("#container").load("<?= base_url('user/calllogs?device=');?>" + lol);


                $("#title").show();



                drawer = document.querySelector('core-scaffold')
                drawer.closeDrawer();



            });
            $(".contacts").click(function () {
                lol = $(this).parent().attr("id");

                lol = lol.trim().replace(/ /g, '%20');
                $("#container").load("<?= base_url('user/contacts/?device=');?>" + lol);



                document.getElementById('title').innerHTML = "Contacts";

                $("#title").show();


                drawer = document.querySelector('core-scaffold')
                drawer.closeDrawer();
            });
            $(".camera").click(function () {
                lol = $(this).parent().attr("id");
                lol = lol.trim().replace(/ /g, '%20');
                                $("#refresh_button").hide();

                $("#container").load("<?= base_url('user/camera/?device=');?>" + lol);
                document.getElementById('title').innerHTML = "Camera";

                $("#title").show();

                drawer = document.querySelector('core-scaffold')
                drawer.closeDrawer();

            });
            $(".sms").click(function () {
                lol = $(this).parent().attr("id");
                lol = lol.trim().replace(/ /g, '%20');

                $("#container").load("<?= base_url('user/messages/?device=');?>" + lol);
                document.getElementById('title').innerHTML = "Messages";

                $("#title").show();


                drawer = document.querySelector('core-scaffold')
                drawer.closeDrawer();

            });
                    $(".audio").click(function () {
                lol = $(this).parent().attr("id");
                lol = lol.trim().replace(/ /g, '%20');
                $("#refresh_button").hide();

                $("#container").load("<?= base_url('user/audio/?device=');?>" + lol);
                document.getElementById('title').innerHTML = "Audio";
                console.log(lol);

                $("#title").show();


                drawer = document.querySelector('core-scaffold')
                drawer.closeDrawer();

            });

            $(".location").click(function () {
                lol = $(this).parent().attr("id");
                lol = lol.trim().replace(/ /g, '%20');

                $("#container").load("<?= base_url('user/location/?device=');?>" + lol);
                document.getElementById('title').innerHTML = "Location";



                $("#title").show();


                drawer = document.querySelector('core-scaffold')
                drawer.closeDrawer();
            });
                    $(".extras").click(function () {
                lol = $(this).parent().attr("id");
                lol = lol.trim().replace(/ /g, '%20');
                                $("#refresh_button").hide();

                $("#container").load("<?= base_url('user/extras/?device=');?>" + lol);
                document.getElementById('title').innerHTML = "Extras";



                $("#title").show();


                drawer = document.querySelector('core-scaffold')
                drawer.closeDrawer();
            });

            $("#refresh_button").click(function () {

                var title = $('#title').text();
                lol = lol.trim().replace(/ /g, '%20');
                $("#refresh_button").hide();
                $("#container").empty();
                $("paper-spinner").attr("active","true");
                if (title == "Call Logs")
                    $("#container").load("<?= base_url('user/refreshcalllogs/?device=');?>" + lol);
                if (title == "Contacts")
                    $("#container").load("<?= base_url('user/refreshcontacts/?device=');?>" + lol);
                if (title == "Messages")
                    $("#container").load("<?= base_url('user/refreshmessages/?device=');?>" + lol);
                if (title == "Location")
                     $("#container").load("<?= base_url('user/refreshlocation/?device=');?>" + lol);
                if (title == "Camera")
                     $("#container").load("<?= base_url('user/refreshcamera/?device=');?>" + lol);






            });
            $('#logout_button').click(function(){

                location.replace("<?= base_url('user/logout');?>");
})
            $('#home_button').click(function(){

                 $("#container").load("<?= base_url('user/dashboard');?>");
})







        });
    </script>

</head>
