<?php

namespace App\Jobs;

use Storage;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Aud2Txt extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue;
    protected $url;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    private function GoogleSpeechAPI($flacFile){

      $base = "https://www.google.com/speech-api/v2/recognize";
      $lang = "ja-jp";
      $output="json";
      $key = "AIzaSyB5WVQ7UPgEIeyqRo9bpP0FRzRce9cBuAQ";
      $contentType = "Content-Type: audio/x-flac; rate=16000;";
      $requestUrl = $base."?output=json&lang=ja-jp&key=$key";

      $curl=curl_init($requestUrl);
      curl_setopt($curl,CURLOPT_POST, TRUE);
      curl_setopt($curl,CURLOPT_HTTPHEADER,array($contentType));
      curl_setopt($curl,CURLOPT_POSTFIELDS,file_get_contents($flacFile));
      curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
      curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($curl,CURLOPT_FOLLOWLOCATION, TRUE);
      $output= curl_exec($curl);
      return $output;
    }


    public function handle()
    {
      Storage::makeDirectory('aud');
      Storage::makeDirectory('aud/trim/');
      Storage::makeDirectory('aud/flac/');

      $fp = fopen("/home/aki/sample.txt", "a+");
      fwrite($fp, "hoge");
      fclose($fp);

#get Recording file
      $ch = curl_init($this->url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $data =  curl_exec($ch);
      curl_close($ch);
      Storage::put('aud/record_file.wav', $data);

#split Recording file
      $output = shell_exec('sox '.storage_path('app/aud/record_file.wav').' '.storage_path('app/aud/trim/output.wav').' trim 0 5 : newfile : restart');

      $file_list = Storage::files(storage_path('app/aud/trim/'));

#convert wav -> flac -> txt
      $text = "";
      foreach ( $file_list as $file_name )
	{
	  $y = str_replace("wav", "flac", $file_name);

	  $output = shell_exec("sox ".storage_path('app/aud/trim/'.$file_name)." -r 16000 ".storage_path('app/aud/flac/'.$y));
	  $text .= GoogleSpeechAPI(storage_path('app/aud/flac/'.$y));
	}
      $fp = fopen("/home/aki/sample.txt", "a+");
      fwrite($fp, $text);
      fclose($fp);

#check words
      $array = array("こんにち", "bar", "hello", "world");
      foreach($array as $sword){
	if( stristr($text, $sword) ){
	  print "match!!";
	  mail("nishino.shuichi@j.mbox.nagoya-u.ac.jp", "WARNING", "This is a test message.", "From: from@example.com");
	}
      }
      #Storage::deleteDirectory('aud');
    }
}
