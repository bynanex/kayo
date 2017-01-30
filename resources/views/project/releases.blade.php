@extends('templates.pages.project')

@section('content')
@if ($releases->count() == 0)
	@include('errors.releases.empty')
@else
	@foreach ($releases as $release)
	{{-- skip releases with no files --}}
	@if ($release->files->count() == 0)
		@continue
	@endif

	<div class="row">
		<div class="col-sm-12 col-lg-2 text-lg-right text-center">
			<section class="release-sidebar">
				<span class="badge {{ $release->badgeClass }}">
					<i class="icon-warning"></i> {{ $release->type }}
				</span>
			</section>
		</div>
		
		<div class="col">
			<section class="release-header text-lg-left text-center">
				{{ $release->name }} <span class="release-version">v{{ $release->version }}</span>

				<ul class="release-info list-inline text-muted">
					<li class="list-inline-item">
						<i class="icon-user"></i>

						<a href="{{ action('UserController@profile', [$release->author]) }}">
							{{ $release->author->display_name }}
						</a>
					</li>

					<li class="list-inline-item">
						<i class="icon-clock"></i>

						<time datetime="{{ $release->created_at }}" title="{{ $release->created_at }}">
							{{ $release->created_at->diffForHumans() }}
						</time>
					</li>
				</ul>
			</section>

			<section class="release-description">
				<article>
					{!! Markdown::convertToHtml($release->description) !!}
				</article>
			</section>

			<section class="release-files">
				<ul>
					@foreach ($release->files as $file)
						<li>
							<div class="float-left">
								<i class="icon-release"></i>

								<a href="{{ action('ReleaseController@download', [$project, $release, $file]) }}">
									{{ $file->filename }}
								</a>
							</div>

							<div class="float-right text-muted">
								{{ $file->formattedSize }}
							</div>

							<div class="clearfix"></div>

							<div class="release-file-info text-muted">
								<b>SHA-256:</b> {{ strtoupper($file->sha256sum) }}
							</div>

							<div class="release-file-info text-muted">
								<b>Signed-by:</b> {{ $file->signed_by }} &mdash; 

								<a href="{{ action('ReleaseController@signature', [$project, $release, $file]) }}">
									<b>{{ $file->fingerprint }}</b>
								</a>
							</div>
						</li>
					@endforeach
				</ul>

				@if (!$loop->last)
				<hr class="release-separator">
				@endif
			</section>
		</div>
	</div>
	@endforeach

	@if ($releases->lastPage() > 1)
		<nav class="page-navigation">
			@if ($releases->currentPage() !== 1)
				<a title="Previous page" href="{{ $releases->previousPageUrl() }}">
					<span class="icon-chevron-left"></span>
				</a>
			@endif
			
			<span class="separator">
				PAGE {{ $releases->currentPage() }} OF {{ $releases->lastPage() }}
			</span>
			
			@if ($releases->hasMorePages())
				<a title="Next page" href="{{ $releases->nextPageUrl() }}">
					<span class="icon-chevron-right"></span>
				</a>
			@endif
		</nav>
	@endif
@endif
@endsection