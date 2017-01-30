@extends('templates.pages.project')

@section('content')
	<div class="img-thumbnail" style="border-radius: 0;">
	@if ($media->isImage)
		<a href="{{ $media->url }}">
			<img class="img-fluid" src="{{ $media->url }}">
		</a>
	@else
		<div class="embed-responsive embed-responsive-16by9">
			<video controls>
				<source src="{{ $media->url }}" type="{{ $media->mimeType }}">
			</video>
		</div>
	@endif
	</div>

	<div style="margin-top: 10px;">
		<div style="font-size: 28px; font-family: 'Roboto Light';">
			{{ $media->title }}
		</div>

		<span style="font-size: 14px;" class="text-muted">
			<ul class="list-inline">
				<li class="list-inline-item">
					<i class="icon-user"></i>

					<a href="{{ action('UserController@profile', [$media->uploader]) }}">
						{{ $media->uploader->display_name }}
					</a>
				</li>

				<li class="list-inline-item">
					<i class="icon-clock"></i>

					<time datetime="{{ $media->created_at }}" title="{{ $media->created_at }}">
						{{ $media->created_at->diffForHumans() }}
					</time>
				</li>
			</ul>
		</span>

		<div style="margin: 20px 0;">
			@if ($media->description)
				{!! Markdown::convertToHtml($media->description) !!}
			@else
				<p class="text-muted">
					No description given.
				</p>
			@endif
		</div>

		<hr>

		<ul class="list-inline" style="font-size: 12px;">
			<li class="list-inline-item">
				<a style="color: #969696; text-transform: uppercase;" href="{{ action('MediaController@download', [$project, $media]) }}">
					<i class="icon-release"></i> Download
				</a>
			</li>
		</ul>
	</div>
@endsection