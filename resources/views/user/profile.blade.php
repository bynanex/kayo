@extends('templates.pages.generic')

@section('content')
	<div class="row">
		{{-- user profile sidebar --}}
		<aside class="user-info col-md-12 col-lg-3">
			{{-- avatar, display name --}}
			<div class="text-center">
				<img src="{{ $user->avatarUrl }}" class="img-thumbnail user-avatar">

				<span class="user-name">
					{{ $user->display_name }}
				</span>

				<small class="text-muted">
					{{ $user->bio }}
				</small>
			</div>

			<hr>

			{{-- extra metadata: location, email, url --}}
			<ul class="user-metadata text-center text-lg-left">
				<li>
					<i class="icon-location"></i> {{ $user->location }}
				</li>

				<li>
					<i class="icon-mail"></i>

					<a href="mailto:{{ $user->email }}">
						{{ $user->email }}
					</a>
				</li>

				@if ($user->url)
				<li>
					<i class="icon-link"></i>

					<a target="_blank" href="{{ $user->url }}">
						{{ $user->url }}
					</a>
				</li>
				@endif
			</ul>

			<hr class="hidden-lg-up">
		</aside>

		{{-- main content section --}}
		<section class="user-content col-md-12 col-lg-9">
			<nav class="user-profile">
				<a href="#" class="list-inline-item active">Projects</a>
				<a href="#" class="list-inline-item">About</a>
			</nav>

			@foreach ($user->maintains()->orderBy('updated_at', 'desc')->get() as $project)
				<div class="user-projects">
					<span class="title">
						<a href="{{ action('ProjectController@overview', [$project]) }}">
							{{ $project->name }}
						</a>
					</span>
					
					<span class="text-muted summary">
						{{ $project->summary }}
					</span>

					<ul class="list-inline metadata">
						<li class="list-inline-item">
							<i class="icon-gear"></i> {{ $project->language }}
						</li>
					</ul>
				</div>
				
				@if (!$loop->last)
				<hr>
				@endif
			@endforeach
		</section>
	</div>
@endsection