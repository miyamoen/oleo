<!DOCTYPE html>
<html>
  <head>
    <title>Oleo Client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link rel="stylesheet" href="./material.min.css">
    <script src="./material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <script type="text/javascript"
        src="https//static.twilio.com/libs/twiliojs/1.2/twilio.min.js">
      </script>
      <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
      </script>
      <link href="http://static0.twilio.com/bundles/quickstart/client.css"
        type="text/css" rel="stylesheet" />
      <script type="text/javascript">

        Twilio.Device.setup("{{$token}}");

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
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
      <header class="mdl-layout__header">
        <div class="mdl-layout-icon"></div>
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Oleo</span>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
          <a href="#main-tab" class="mdl-layout__tab is-active">main</a>
          <a href="#call-tab" class="mdl-layout__tab"><i class="material-icons">call</i></a>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Oleo menu</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="#">Nav link 2</a>
          <a class="mdl-navigation__link" href="#">Nav link 2</a>
          <a class="mdl-navigation__link" href="#">Nav link 3</a>
        </nav>
      </div>

      <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="main-tab">
          <div class="page-content">main tabだよ</div>
        </section>

        <section class="mdl-layout__tab-panel" id="call-tab">
          <div class="page-content">
            <div id="log">Loading pigeons...</div>
            <div class="mdl-grid">

              <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                  <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="number" name="number"/>
                  <label class="mdl-textfield__label" for="number">Enter a phone number to call...</label>
                  <span class="mdl-textfield__error">Input is not a number!</span>
                </div>
              </div>

              <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div id="call_button">
                  <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent" onclick="call();">
                    <i class="material-icons">call</i>
                  </button>
                </div>
                <div for="call_button" class="mdl-tooltip mdl-tooltip--large">CALL</div>
              </div>

              <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div id="callend_button">
                  <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect mdl-button--accent" onclick="hangup();">
                    <i class="material-icons">call_end</i>
                  </button>
                </div>

                <span for="callend_button" class="mdl-tooltip mdl-tooltip--large">CALL END</span>
              </div>

            </div>
          </div>
        </section>








      <!-- <div id="log_button">
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent" onClick="location.href='http://cefce6.cplaza.engg.nagoya-u.ac.jp/oleo-client/log'">
          <i class="material-icons">history</i>
        </button>
      </div>
      <span for="log_button" class="mdl-tooltip mdl-tooltip--large">SHOW LOG</span>
      -->





      </main>
  </div>

  </body>
</html>

