@include('templates.header')
@include('templates.headerinclude')
@include('templates.footer')
<!DOCTYPE html>
<html lang="en">
	<head>
		@yield('headerinclude')
	</head>
	<body>
		@yield('header')
		
		<div class="container">
			<main>
				@yield('content')
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>