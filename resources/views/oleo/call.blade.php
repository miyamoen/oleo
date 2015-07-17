@extends('layouts.twiml')

@section('content')
    <Say language="ja-jp">この通話は録音されています。</Say>
    <Dial callerId="{{$sender}}"  record="true" method="GET"  action="http://cefce6.cplaza.engg.nagoya-u.ac.jp/api/ver1.0/log" >
        <Number>{{'+'.$recipient}}</Number>
    </Dial>
    <Say language="ja-jp">通話が終了致しました。</Say>
@endsection
