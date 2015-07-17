<?php
  // Download/Install the PHP helper library from twilio.com/docs/libraries.
  // This line loads the library
// require('/home/aki/souzouapp/resources/views/oleo/Services/Twilio.php');


// Your Account Sid and Auth Token from twilio.com/user/account

// Get an object from its sid. If you do not have a sid,
// check out the list resource examples on this page
$call = $client->account->calls->get("CAe04f4cb81e623dd7b34b9b14c0639e08");
print_r($call);
