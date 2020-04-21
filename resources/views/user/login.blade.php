@extends('app')
@section('content')
	<form method="POST" action="/login">
		@csrf
		<h2>Login</h2>
		<input type="email" name="email" placeholder="Your email...">
		<input type="password" name="password" placeholder="Your password...">
		<input type="submit" value="Login">
	</form>
@endsection