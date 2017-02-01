@extends('templates.pages.generic')

@section('content')
<div class="card-columns">
	@foreach ($projects as $project)
		<div class="card">
			@if ($project->bannerUrl)
			<a href="{{ action('ProjectController@overview', [$project->slug]) }}">
				<img class="card-img-top img-fluid" src="{{ $project->bannerUrl }}" alt="{{ $project->name}}">
			</a>
			@endif

			<div class="card-block">
				<h4 class="card-title">
					<a href="{{ action('ProjectController@overview', [$project->slug]) }}">
						{{ $project->name }}
					</a>
				</h4>

				<p class="summary">{{ $project->summary }}</p>

				@if ($project->releases->count() >= 1)
				<div>
					<small class="text-muted">
						<i class="icon-release"></i> {{ $project->releases->count(). ' '.str_plural('release', $project->releases->count()) }}
					</small>
				</div>
				@endif
			</div>
		</div>
	@endforeach
	</div>

	@if ($projects->lastPage() > 1)
		<nav class="page-navigation">
			@if ($projects->currentPage() !== 1)
				<a title="Previous page" href="{{ $projects->previousPageUrl() }}">
					<span class="icon-chevron-left"></span>
				</a>
			@endif
			
			<span class="separator">
				PAGE {{ $projects->currentPage() }} OF {{ $projects->lastPage() }}
			</span>
			
			@if ($projects->hasMorePages())
				<a title="Next page" href="{{ $projects->nextPageUrl() }}">
					<span class="icon-chevron-right"></span>
				</a>
			@endif
		</nav>
	@endif
@endsection