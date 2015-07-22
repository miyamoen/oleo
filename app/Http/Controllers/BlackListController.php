<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Services_Twilio_Capability;
use Services_Twilio;
use DB;

class BlackListController extends Controller
{
    private $account_sid;
    private $auth_token;
    private $app_sid;
    private $app_name;

    function __construct()
    {
        $this->account_sid = config('oleo.account_sid');
        $this->auth_token = config('oleo.auth_token');
        $this->app_sid = config('oleo.app_sid');
        $this->app_name = config('oleo.app_name');


    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $capability = new Services_Twilio_Capability($this->account_sid, $this->auth_token);
        $capability->allowClientOutgoing($this->app_sid);
        $capability->allowClientIncoming($this->app_name);
        $token = $capability->generateToken();
        return view('oleo.client.black_list')->with('token', $token);
    }

    public function getLog()
    {
        $client = new Services_Twilio($this->account_sid, $this->auth_token);
        $call = $client->account->calls->get("CAe04f4cb81e623dd7b34b9b14c0639e08");
        return dd($call);
        // return view('oleo.client.log');
    }

    public function getPhone()
    {
        return view('oleo.client.index');
    }


}
