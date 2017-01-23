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
			@if (isset($empty) && $empty)
				@include('errors.wiki.empty')
			@else
				<div class="row">
					@php
						$highlighted = App\WikiPage::whereHighlighted(1)->get();
					@endphp

					{{-- navigation sidebar --}}
					@if ($highlighted->count() >= 1)
					<div class="wiki-sidebar col-md-12 col-lg-3">
						<nav class="text-center text-lg-left">
						@foreach ($highlighted as $sidebar_page)
							<a class="item{{ $page->slug == $sidebar_page->slug ? ' active': '' }}" title="{{ $sidebar_page->title }}" href="{{ action('ProjectController@wiki', [$project, $sidebar_page]) }}">
								{{ $sidebar_page->title }}
							</a>
						@endforeach
						</nav>
					</div>
					@endif

					{{-- actual page --}}
					<div class="col">
						{{-- page header --}}
						<header class="text-center text-lg-left">
							<h1 class="main-font">{{ $page->title }}</h1>
							
							<small class="text-muted">
								{{-- created by.. --}}
								by {{ $page->author->display_name }}

								{{-- add 'last edited X ago by Y' note if applicable --}}
								@if ($page->updated_at > $page->created_at)
									&mdash; last edited <span title="{{ $page->updated_at }}">{{ $page->updated_at->diffForHumans() }}</span> by {{ $page->last_editor->display_name }}
								@endif
							</small>
						</header>

						<hr>

						<article>
							{!! Markdown::convertToHtml($page->content) !!}
						</article>
					</div>
				</div>
			@endif
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>