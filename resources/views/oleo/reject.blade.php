@extends('layouts.twiml')

@section('content')
    <Say language="ja-jp">あなたはブラックリストに登録されています</Say>
    <Reject reason="busy" />
@endsection
