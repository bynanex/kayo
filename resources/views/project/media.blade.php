@extends('templates.pages.project')

@section('title', 'Media · '.$project->name)

@section('content')
@if ($media->count() == 0)
	@include('errors.media.empty')
@else
	<div class="row"> 
	@foreach ($media as $media_item)
		<figure class="col-lg-4 col-md-6 col-xs-12 media-item">
			<div class="container">
				<a href="{{ action('MediaController@view', [$project, $media_item]) }}">
					<div class="embed-responsive embed-responsive-16by9" style="background-image: url('{{ $media_item->thumbnailUrl }}');">
					</div>
				</a>
			</div>
			
			<figcaption>
				<span class="title">
					<a href="{{ action('MediaController@view', [$project, $media_item]) }}">
						{{ $media_item->title }}
					</a>
				</span>
				
				<ul class="list-inline">
					<li class="list-inline-item">
						<i class="icon-user"></i>

						<a href="{{ action('UserController@profile', [$media_item->uploader]) }}">
							{{ $media_item->uploader->display_name }}
						</a>
					</li>

					<li class="list-inline-item">
						<i class="icon-clock"></i>

						<time datetime="{{ $media_item->created_at }}" title="{{ $media_item->created_at }}">
							{{ $media_item->created_at->diffForHumans() }}
						</time>
					</li>
				</ul>
			</figcaption>
		</figure>
	@endforeach
	</div>

	@if ($media->lastPage() > 1)
		<nav class="page-navigation">
			@if ($media->currentPage() !== 1)
				<a title="Previous page" href="{{ $media->previousPageUrl() }}">
					<span class="icon-chevron-left"></span>
				</a>
			@endif
			
			<span class="separator">
				PAGE {{ $media->currentPage() }} OF {{ $media->lastPage() }}
			</span>
			
			@if ($media->hasMorePages())
				<a title="Next page" href="{{ $media->nextPageUrl() }}">
					<span class="icon-chevron-right"></span>
				</a>
			@endif
		</nav>
	@endif
@endif
@endsection