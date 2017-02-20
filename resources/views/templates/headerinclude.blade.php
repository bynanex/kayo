@section('headerinclude')
	<title>@yield('title', config('app.name'))</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="theme-color" content="#2B2B2B">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ env('STATIC_URL').mix('css/app.css') }}" rel="stylesheet" type="text/css">
	<link rel="icon" href="{{ env('STATIC_URL').'/img/favicon.png' }}">
	<link rel="apple-touch-icon" href="{{ env('STATIC_URL').'/img/icon.png' }}">
	<style type="text/css">
		@stack('styles-inline')
	</style>
@endsection