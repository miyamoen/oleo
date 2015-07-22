<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

  public function getIndex(Request $request)
  {
    $black_list = DB::table('black_lists')->lists('number');
    $from = $request->input('From', '');
    if (in_array($from, $black_list))
    {
      return view('oleo.reject');
    }else{
      $numbers = [
        'sender' => config('oleo.my_number'),
      ];

      if ($request->has('PhoneNumber'))
      {
        $numbers['recipient'] = $request->input('PhoneNumber');
        return response()->view('oleo.call', $numbers)->header('Content-Type', 'text/xml');
      }else{
        return response()->view('oleo.receive', $numbers)->header('Content-Type', 'text/xml');
      }
    }
  }


    public function getBlack_list(Request $request)
    {
        return DB::table('black_lists')->insertGetId(
            ['number' => $request->input('PhoneNum')]
            );
    }
    public function getLog(Request $request)
    {
       /* ログデータ準備 */
        $log_data = [
            'Call_Sid' => $request->input("DialCallSid",""),
            'DialCallStatus' => $request->input("DialCallStatus",""),
            'AccountSid' => $request->input("AccountSid",""),
            'CallDuration' => $request->input("DialCallDuration",""),
            'RecordingUrl' => $request->input("RecordingUrl",""),
            ];
          DB::table('logs')->insert($log_data);

	return view('oleo.log');

    }
}
