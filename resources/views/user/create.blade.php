@extends('app')
@section('content')
	<form method="POST" action="/register">
		@csrf
		<h2>Sign Up</h2>
		<input type="text" name="name" placeholder="Your name...">
		<input type="email" name="email" placeholder="Your email...">
		<input type="password" name="password" placeholder="Your password...">
		<input type="password" name="password_confirmation" placeholder="Confirm password...">
		<input type="submit" value="Register">
	</form>
@endsection