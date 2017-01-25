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
				@if ($media->isImage)
					<img class="img-fluid" src="{{ $media->url }}">
				@else
					<div class="embed-responsive embed-responsive-16by9">
						<video autoplay controls>
							<source src="{{ $media->url }}" type="{{ $media->mimeType }}">
						</video>
					</div>
				@endif

				<a href="{{ action('MediaController@download', [$project, $media]) }}">Download</a>	
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>