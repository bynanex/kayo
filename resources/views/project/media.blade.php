@include('templates.header')
@include('templates.footer')
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>kayo</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ elixir('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
		<style type="text/css">
			@stack('styles-inline')
		</style>
	</head>
	<body>
		@yield('header')
		
		<div class="container">
			<main>
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
									<i class="icon-user"></i> {{ $media->uploader->display_name }}
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
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>