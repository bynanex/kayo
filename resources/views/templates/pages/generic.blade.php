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
			<header class="index">
				<div class="logo">
					<a href="/">
						{{-- include the logo vector --}}
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 898 300">
							{!! file_get_contents('../resources/assets/img/logo.svg') !!}
						</svg>
					</a>
				</div>
			</header>

			<main>
				@yield('content')
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>