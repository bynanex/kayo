@extends('templates.pages.project')

@section('title', 'Maintainers · '.$project->name)

@section('content')
	<div class="row">
	@foreach ($project->maintainers as $maintainer)
		{{-- TODO: un-inline these styles, clean this up!! --}}
		<div class="col-md-6 col-sm-12" style="margin-bottom: 10px;">
			<div class="media">
				<img class="d-flex mr-3 img-thumbnail" src="{{ $maintainer->avatarUrl }}" style="width: 48px; border-radius: 0; padding: 2px;">
				
				<div class="media-body">
					<a style="font-size: 16px; font-weight: 600;" href="{{ action('UserController@profile', [$maintainer]) }}">
						{{ $maintainer->display_name }}
					</a>

					<ul class="list-inline text-muted" style="font-size: 14px;">
						@if ($maintainer->location)
						<li class="list-inline-item">
							<i class="icon-location"></i> {{ $maintainer->location }}
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	@endforeach
	</div>
@endsection