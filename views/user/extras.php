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

    paper-button[raised].colored {
        background: #009688;
        color: #fff;
    }

    paper-input-decorator /deep/ .focused-underline {
        /* line color when the input is focused */

        background-color: #80CBC4;
    }
    paper-toast {
  right: 10px;
  left: auto;
}
</style>

<script>

    var toast = document.getElementById('toast');
    var container = document.querySelector('#container');
    var msnry = new Masonry(container, {
        // options
        columnWidth: 310,
        itemSelector: '.card'
    });
    device = $('#device').val();

    $('#flashLightOn,#flashLightOff').click(function () {
     var reqData = {
            message: $(this).text(),

            device: $('#device').val()

        };


              $.ajax({

               url: 'http://128.199.179.143/groups/user/flashLight',
               type: 'POST',
               data: reqData,
               success: function (response) {
                   if(response == "success")
                   {
                   toast.text = response;
                   toast.show();
                   }
                   else
                   {
                   toast.text = response;
                   toast.show();
                   }


               }





           });
    });

        $('#vibratePhoneOn,#vibratePhoneOff').click(function () {
     var reqData = {
            message: $(this).text(),

            device: $('#device').val()

        };
              $.ajax({

               url: 'http://128.199.179.143/groups/user/vibratePhone',
               type: 'POST',
               data: reqData,
               success: function (response) {
                   if(response == "success")
                   {
                   toast.text = response;
                   toast.show();
                   }
                   else
                   {
                   toast.text = response;
                   toast.show();
                   }


               }





           });
    });

           $('#AlarmOn,#AlarmOff').click(function () {
     var reqData = {
            message: $(this).text(),

            device: $('#device').val()

        };
              $.ajax({

               url: 'http://128.199.179.143/groups/user/alarm',
               type: 'POST',
               data: reqData,
               success: function (response) {
                   if(response == "success")
                   {
                   toast.text = response;
                   toast.show();
                   }
                   else
                   {
                   toast.text = response;
                   toast.show();
                   }


               }





           });
    });

           $('#frontCamera,#backCamera').click(function () {
     var reqData = {
            message: $(this).text(),

            device: $('#device').val()

        };
              $.ajax({

               url: 'http://128.199.179.143/groups/user/takePhoto',
               type: 'POST',
               data: reqData,
               success: function (response) {
                   if(response == "success")
                   {
                   toast.text = response;
                   toast.show();
                   }
                   else
                   {
                   toast.text = response;
                   toast.show();
                   }


               }





           });
    });

           $('#captureAudio').click(function () {
     var reqData = {
            message: $('#seconds').val(),
            device: $('#device').val()

        };
        console.log(reqData);
              $.ajax({

               url: 'http://128.199.179.143/groups/user/captureAudio',
               type: 'POST',
               data: reqData,
               success: function (response) {
                    if(response == "success")
                   {
                   toast.text = response;
                   toast.show();
                   }
                   else
                   {
                   toast.text = response;
                   toast.show();
                   }


               }





           });
    });

    $('#makeCall').click(function () {
                  var callNumber = document.getElementById('p-call-number');

       var reqData = {
            number: $('#call-number').val(),

            device: $('#device').val()

        };
        if(reqData['number']!= '')
           $.ajax({

                url: 'http://128.199.179.143/groups/user/makeCall',
                type: 'POST',
                data: reqData,
                success: function (response) {

                  console.log(response);
                  if(response=="success")
                  {
                   callNumber.isInvalid = false;
                   toast.text = response;
                   toast.show();


                  }
                  else
                  {

            callNumber.isInvalid = true;
            callNumber.error = response;

                  }
                }





            });
    });
    $('#sendSMS').click(function () {
        $('#result').html('<img src="http://128.199.179.143/groups/assets/web/ajax.gif" />')
        var reqData = {
            number: $('#sms-number').val(),
            message: $('#sms-message').val(),
            device: $('#device').val()

        };



        if (reqData['number'] == '') {
            var smsNumber = document.getElementById('p-sms-number');
            smsNumber.isInvalid = true;
            smsNumber.error = "Cannot Be Empty";
        }
        if (reqData['message'] == '') {
            var smsMessage = document.getElementById('p-sms-message');


            smsMessage.isInvalid = true;
            smsMessage.error = "Cannot Be Empty";
        }
        if (reqData['number'] != '' && reqData['message'] != '' && reqData['device'] != '') {
                var smsNumber = document.getElementById('p-sms-number');
            if(!smsNumber.isInvalid)
            {
                console.log(reqData);
            $.ajax({

                url: 'http://128.199.179.143/groups/user/sendSMS',
                type: 'POST',
                data: reqData,
                success: function (response) {
                     if(response == "success")
                   {
                   toast.text = response;
                   toast.show();
                   }

                }





            });

        }}


    });

    // var scope = document.querySelector('template[is=auto-binding]');

    // scope.inputAction = function (e) {

    //     var d = document.getElementById('p-sms-number');
    //     d.error = "is not a phone number";
    //     d.isInvalid = !e.target.validity.valid;

    // }

    // $('#message').on('input', function () {
    //     var d = document.getElementById('p-sms-message');
    //     var button = document.getElementById('sendSMS');

    //     d.isInvalid = false;
    // }).trigger('input');

</script>

<paper-toast id="toast"></paper-toast>

<paper-shadow class="card">
    Make Call



    <paper-input-decorator floatingLabel label="Phone Number" id='p-call-number'>
        <input is="core-input" class="form-control" type="text" id="call-number">
        <input type="hidden" class="form-control" id="device" name="device" <?php echo "value='".$device. "'" ?> >

    </paper-input-decorator>


    <BR>
    <paper-button id="makeCall" style="text-align:center;" raised class="colored" type="submit" value="makeCall" name="makeCall">Call</paper-button>

</paper-shadow>

<paper-shadow class="card">
    Send SMS

        <paper-input-decorator label="Phone Number" floatingLabel id='p-sms-number'>
            <input is="core-input" class="form-control" pattern="^\+(?:[0-9]●?){6,14}[0-9]$" on-input="{{inputAction}}" id="sms-number">
        </paper-input-decorator>

    <paper-input-decorator label="Message" floatingLabel id='p-sms-message'>
        <input is="core-input" class="form-control" id="sms-message">
    </paper-input-decorator>
    <input type="hidden" class="form-control" id="device" name="device" <?php echo "value='".$device. "'" ?> >
    <paper-button id="sendSMS" style="text-align:center;" raised class="colored" type="submit" value="sendSMS" name="sendSMS">Send</paper-button>

</paper-shadow>



<paper-shadow class="card">
   Flash Light
    <BR>
     <BR>
       <BR>
    <paper-button id="flashLightOn" style="text-align:center;" raised class="colored" type="submit" value="ON" >ON</paper-button>
    <paper-button id="flashLightOff" style="text-align:center;" raised class="colored" type="submit" value="OFF" >OFF</paper-button>

</paper-shadow>

<paper-shadow class="card">
   Vibrate Phone
    <BR>
     <BR>
       <BR>
    <paper-button id="vibratePhoneOn" style="text-align:center;" raised class="colored" type="submit" value="ON" >ON</paper-button>
    <paper-button id="vibratePhoneOff" style="text-align:center;" raised class="colored" type="submit" value="OFF" >OFF</paper-button>

</paper-shadow>

<paper-shadow class="card">
   Alarm
    <BR>
     <BR>
       <BR>
    <paper-button id="AlarmOn" style="text-align:center;" raised class="colored" type="submit" value="ON" >ON</paper-button>
    <paper-button id="AlarmOff" style="text-align:center;" raised class="colored" type="submit" value="OFF" >OFF</paper-button>

</paper-shadow>

<paper-shadow class="card">
   Take Photo
    <BR>
     <BR>
       <BR>
    <paper-button id="frontCamera" style="text-align:center;" raised class="colored" type="submit" value="frontCamera">Front</paper-button>
    <paper-button id="backCamera" style="text-align:center;" raised class="colored" type="submit" value="backCamera">Back</paper-button>

</paper-shadow>

<paper-shadow class="card">
   Capture Audio
    <BR>

        <paper-input-decorator label="Seconds(Max:300)" floatingLabel id='p-seconds'>
        <input is="core-input" class="form-control" id="seconds">
    </paper-input-decorator>
    <paper-button id="captureAudio" style="text-align:center;" raised class="colored" type="submit" value="captureAudio">captureAudio</paper-button>

</paper-shadow>
