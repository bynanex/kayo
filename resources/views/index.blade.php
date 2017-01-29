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
			<header class="index">
				<div class="logo" id="logo">
					<a href="#">
						{{-- include the logo vector --}}
						<svg xmlns="http://www.w3.org/2000/svg" id="kayo" viewBox="0 0 898 300">
							{!! file_get_contents('../resources/assets/img/logo.svg') !!}
						</svg>
					</a>
				</div>
			</header>
			
			<main>
				<div class="card-columns">
				@foreach (App\Project::all() as $project)
					<div class="card">
						@if ($project->bannerUrl)
						<a href="{{ action('ProjectController@overview', [$project->slug]) }}">
							<img class="card-img-top img-fluid" src="{{ $project->bannerUrl }}" alt="{{ $project->name}}">
						</a>
						@endif

						<div class="card-block">
							<h4 class="card-title">
								<a href="{{ action('ProjectController@overview', [$project->slug]) }}">
									{{ $project->name }}
								</a>
							</h4>

							<small class="card-text">
								<p>{{ $project->summary }}</p>
							</small>

							<div>
								<small class="text-muted">
									<i class="icon-release"></i> {{ $project->releases->count(). ' '.str_plural('release', $project->releases->count()) }}
								</small>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>