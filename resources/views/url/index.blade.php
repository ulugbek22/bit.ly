@extends('app')
@section('content')
	@if(auth()->check())
	<form method="POST" action="/">
		@csrf
		<input type="text" name="long" placeholder="Enter your url...">
		<input type="submit" value="Short it">
	</form>
	@else
		<h2>Please register or login first.</h2>
	@endif
@endsection