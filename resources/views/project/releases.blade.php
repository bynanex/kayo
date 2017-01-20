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
	</head>
	<body>
		<header class="immersive">
			<div class="container">
				<div class="float-left">
					{{ $project->name }}
				</div>

				<nav class="float-right">
					<a href="{{ action('ProjectController@view', [$project]) }}" class="item">Overview</a>
					<a href="{{ action('ProjectController@releases', [$project]) }}" class="item active">Releases</a>
				</nav>

				<div class="clearfix"></div>
			</div>

			<section class="infobar">
				<div class="container">
					<ul class="list-inline">
						<li class="list-inline-item">An item</li>
						<li class="list-inline-item">An item</li>
						<li class="list-inline-item">An item</li>
						<li class="list-inline-item">An item</li>
						<li class="list-inline-item">An item</li>
					</ul>
				</div>
			</section>
		</header>
		
		<div class="container">
			<main>
				@foreach ($project->releases as $release)
				<h4>{{ $release->name }} ({{ $release->slug }})</h4>
				<hr>

				<ul>
					@foreach ($release->files as $file)
						<li>{{ $file->rawFilename }} ({{ $file->formattedSize }})</li>
					@endforeach
				</ul>
				@endforeach
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>