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
		<div class="container">
			<header class="index">kayo</header>
			
			<main>
			@foreach (App\Project::all() as $project)
				<div class="card-columns">
					<div class="card text-center">
						<div class="card-block">
							<h4 class="card-title">
								<a href="{{ action('ProjectController@view', [$project->slug]) }}">
									{{ $project->name }}
								</a>
							</h4>

							<p class="card-text">Project description goes here</p>
						</div>
						<div class="card-footer">
							<small class="text-muted">
								{{ $project->releases->count(). ' '.str_plural('release', $project->releases->count()) }}
							</small>
						</div>
					</div>
				</div>
			@endforeach
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>