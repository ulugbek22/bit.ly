@extends('app')
@section('content')
	<p>Your short Url:</p>
	<h1><a href="/{{ $url->short }}">bit.ly/{{ $url->short }}</a></h1>
@endsection