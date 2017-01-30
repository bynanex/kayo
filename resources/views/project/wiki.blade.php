@extends('templates.pages.project')

@if (!$page->exists)
	@section('title', $project->name.' Wiki')
@else
	@section('title', $page->title.' · '.$project->name.' Wiki')
@endif

@section('content')
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
					{{-- if never edited last_editor will be the author --}}
					<a href="{{ action('UserController@profile', [$page->last_editor]) }}">
						{{ $page->last_editor->display_name }}
					</a>

					@if ($page->updated_at > $page->created_at)
						edited this page
					@else
						published this page
					@endif

					<time datetime="{{ $page->updated_at }}" title="{{ $page->updated_at }}">
						{{ $page->updated_at->diffForHumans() }}
					</time>
				</small>
			</header>

			<hr>

			<article>
				{!! Markdown::convertToHtml($page->content) !!}
			</article>
		</div>
	</div>
@endif
@endsection