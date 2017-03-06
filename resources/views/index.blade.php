@extends('templates.pages.generic')

@section('content')
@if ($projects->count() == 0)
	@include('errors.index.empty')
@else
<div class="card-columns">
	@foreach ($projects as $project)
		<div class="card">
			<div class="tile" style="background-image: url('{{ $project->doesBannerThumbnailExist ? $project->bannerThumbnailUrl: $project->bannerUrl }}');">
				<a href="{{ action('ProjectController@overview', [$project]) }}">
					<div class="overlay"></div>
				</a>

				<div class="info">
					@if ($project->releases->count() >= 1 || $project->language)
					<div class="icons">
						<ul class="list-inline">
							@if ($project->releases->count() >= 1)
								<li class="list-inline-item">
									<i class="icon-release"></i> {{ $project->releases->count(). ' '.str_plural('release', $project->releases->count()) }}
								</li>
							@endif

							@if ($project->language)
								<li class="list-inline-item">
									<i class="icon-gear"></i> {{ $project->language }}
								</li>
							@endif
						</ul>
					</div>
					@endif

					<div class="content">
						<span class="title">
							{{ $project->name }}
						</span>

						<p class="summary">{{ $project->summary }}</p>
					</div>
				</div>
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
@endif
@endsection