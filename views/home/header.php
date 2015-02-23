<html>

<head>
  <link rel="import" href="<?= base_url('assets/web/bower_components/core-elements/core-elements.html')?>">
    <link rel="import" href="<?= base_url('assets/web/bower_components/paper-elements/paper-elements.html')?>">
    <link rel="import" href="<?= base_url('assets/web/bower_components/google-map/google-map.html')?>">

    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

    <script src="<?= base_url('assets/web/bower_components/webcomponentsjs/webcomponents.js')?>"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=yes">
    <style>
        .card {
            display: inline-block;
            font-family: 'Roboto', sans-serif;
            background: white;
            box-sizing: border-box;
            width: auto;
            height: auto;
            padding: 16px;
            border-radius: 2px;
            text-align: center;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -115px;
            margin-top: -80px;
        }
        paper-button[raised].colored {
            background: #009688;
            color: #fff;
        }
        paper-input-decorator /deep/ .focused-underline {
            /* line color when the input is focused */
            background-color: #80CBC4;
        }
    </style>

</head>