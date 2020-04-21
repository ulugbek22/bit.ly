@extends('app')
@section('content')
	@if($urls)
		<ul>
			@foreach($urls as $url)
				<li>
					<a href="{{ $url->long }}">{{ $url->long }}</a> - <a href="/{{ $url->short }}">{{ $url->short }}</a>
					<a href="/delete/{{ $url->id }}">Delete</a>
				</li>
			@endforeach
		</ul>
	@else
		<h2>No urls yet</h2>
		<p>Create one</p>
	@endif
@endsection