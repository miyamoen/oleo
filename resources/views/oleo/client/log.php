<?php
  // Download/Install the PHP helper library from twilio.com/docs/libraries.
  // This line loads the library
require('/home/aki/souzouapp/resources/views/oleo/Services/Twilio.php');

 
// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "AC21ecd10b49eb2f291a16a8d8df8a4919"; 
$token = "a0123aa3109d8f36f823feb1f56bee52";
$client = new Services_Twilio($sid, $token);


$client = new Services_Twilio($sid, $token);
     
// Get an object from its sid. If you do not have a sid,
// check out the list resource examples on this page
$call = $client->account->calls->get("CAe04f4cb81e623dd7b34b9b14c0639e08");
print_r($call);
