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
	</head>
	<body>
		<header class="immersive">
			@yield('header')
		</header>
		
		<div class="container">
			<main>
				@foreach ($project->releases as $release)
				<h4>{{ $release->name }} ({{ $release->slug }})</h4>
				<b>Uploaded by:</b> {{ $release->author->display_name }}

				<hr>

				<ul>
					@foreach ($release->files as $file)
						<li>
							<div>{{ $file->rawFilename }} ({{ $file->formattedSize }})</div>

							<a href="{{ action('ReleaseController@download', [$project, $release, $file]) }}">[DOWNLOAD]</a>
							
							@if ($file->signature)
							<a href="{{ action('ReleaseController@signature', [$project, $release, $file]) }}">[SIGNATURE]</a>
							<div><b>Signed by:</b> {{ $file->fingerprint }}</div>
							@endif
						</li>
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