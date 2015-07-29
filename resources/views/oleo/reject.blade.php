@extends('layouts.twiml')

@section('content')
    <Say language="ja-jp">あなたはブラックリストに登録されています</Say>
    <Pause length="10"/>
    <Reject />
@endsection
