@extends('templates.pages.project')

@section('content')
	<div class="row"> 
	@foreach ($project->media as $media)
		<figure class="col-lg-4 col-md-6 col-xs-12 media-item">
			<div class="container">
				<a href="{{ action('MediaController@view', [$project, $media]) }}">
					<div class="embed-responsive embed-responsive-16by9" style="background-image: url('{{ $media->thumbnailUrl }}');">
					</div>
				</a>
			</div>
			
			<figcaption>
				<span class="title">
					<a href="{{ action('MediaController@view', [$project, $media]) }}">
						{{ $media->title }}
					</a>
				</span>
				
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
			</figcaption>
		</figure>
	@endforeach
	</div>
@endsection