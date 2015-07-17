<!DOCTYPE html>
<html>
  <head>
    <title>Oleo Client</title>
    <script type="text/javascript"
      src="https//static.twilio.com/libs/twiliojs/1.2/twilio.min.js">
    </script>
    <script type="text/javascript"
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>
    <link href="http://static0.twilio.com/bundles/quickstart/client.css"
      type="text/css" rel="stylesheet" />
    <script type="text/javascript">

      Twilio.Device.setup("<?php echo $token; ?>");

      Twilio.Device.ready(function (device) {
        $("#log").text("Ready");
      });

      Twilio.Device.error(function (error) {
        $("#log").text("Error: " + error.message);
      });

      Twilio.Device.connect(function (conn) {
        $("#log").text("Successfully established call");
      });

      Twilio.Device.disconnect(function (conn) {
        $("#log").text("Call ended");
      });

      Twilio.Device.incoming(function (conn) {
        $("#log").text("Incoming connection from " + conn.parameters.From);
        // accept the incoming connection and start two-way audio
        conn.accept();
      });


      function call() {
//        Twilio.Device.connect();
        // get the phone number to connect the call to
        params = {"PhoneNumber": $("#number").val()};
        Twilio.Device.connect(params);
      }

      function hangup() {
        Twilio.Device.disconnectAll();
      }

    </script>
  </head>
  <body>
    <button class="call" onclick="call();">
      Call
    </button>
    <button class="hangup" onclick="hangup();">
      Hangup
    </button>
    <button class="call" onClick="location.href='http://cefce6.cplaza.engg.nagoya-u.ac.jp/oleo-client/log'">
      History
    </button>
    <input type="text" id="number" name="number"
      placeholder="Enter a phone number to call"/>

    <div id="log">Loading pigeons...</div>
  </body>
</html>
