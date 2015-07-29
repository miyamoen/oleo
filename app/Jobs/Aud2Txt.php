<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class Aud2Txt extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {

      $url = $request->input("RecordingUrl","");
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_exec($ch);
      curl_close($ch);
    }
}
