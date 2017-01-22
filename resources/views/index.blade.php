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
			#logo {
				background-image: url('{{ elixir('img/logo.png') }}');
				background-image: linear-gradient(transparent, transparent), url('{{ elixir('img/logo.svg', env('ELIXIR_DIRECTORY')) }}');
			}

			#logo-alt {
				background-image: url('{{ elixir('img/logo-alt.png') }}');
				background-image: linear-gradient(transparent, transparent), url('{{ elixir('img/logo-alt.svg', env('ELIXIR_DIRECTORY')) }}');
			}
		</style>
	</head>
	<body>
		<div class="container">
			<header class="index">
				<div class="logo" id="logo">
					<a href="#"></a>
				</div>
			</header>
			
			<main>
			@foreach (App\Project::all() as $project)
				<div class="card-columns">
					<div class="card">
						<div class="card-block">
							<h4 class="card-title">
								<a href="{{ action('ProjectController@view', [$project->slug]) }}">
									{{ $project->name }}
								</a>
							</h4>

							<small class="card-text">
								<p>Project description goes here.</p>
							</small>

							<div>
								<small class="text-muted">
									<i class="icon-release"></i> {{ $project->releases->count(). ' '.str_plural('release', $project->releases->count()) }}
								</small>
							</div>
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