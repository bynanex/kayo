@extends('templates.pages.project')

@section('content')
	{{-- obvious placeholder alert! --}}
	<ul>
	@foreach ($project->maintainers as $maintainer)
		<li>
			<a href="{{ action('UserController@profile', [$maintainer]) }}">
				{{ $maintainer->display_name }}
			</a>
		</li>
	@endforeach
	</ul>
@endsection