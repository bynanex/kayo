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
		<header>
			{{ $project->name }}
			<nav></nav>
		</header>
		
		<div class="container">
			<main>
				Project information goes here.
			</main>
			
			<footer>
				<p class="float-left">
					&copy; 2017, aixxe.net
				</p>
				<div class="float-right">
					<ul class="list-inline">
						<li class="list-inline-item"><a href="#">Blog</a></li>
						<li class="list-inline-item"><a href="#">About</a></li>
						<li class="list-inline-item"><a href="#">Contact</a></li>
					</ul>
				</div>
			</footer>
		</div>
	</body>
</html>