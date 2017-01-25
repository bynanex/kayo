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
				<article>
					{!! Markdown::convertToHtml($project->description) !!}
				</article>
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>