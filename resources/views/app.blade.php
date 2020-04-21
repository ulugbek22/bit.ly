<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1><a href="/">Bit.ly</a></h1>
	@if(Auth::check())
		<a href="/my-urls">My Urls</a>
		<a href="/logout">Logout</a>
	@else
		<a href="/login">Login</a>
		<a href="/register">Sign up</a>
	@endif
	@yield('content')
	@include('alert')
</body>
</html>