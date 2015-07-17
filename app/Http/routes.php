<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('api/ver1.0/{message}', 'ResponseController@index');
Route::controller('api/ver1.0', 'ResponseController');
Route::controller('oleo-client', 'ClientController');


/*
Route::post('/record', function(){
      if (Input::has('user_name')) {
	$hoge=gInput::get('RecordingUrl');
	$fuga=Input::get('RecordingDuration');

	$fp = fopen("~database.txt", "w");
	fwrite($fp, $hoge);
	fwrite($fp, $fuga);

	fclose($fp);
      }
});
*/
