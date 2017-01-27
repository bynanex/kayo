{{-- push the banner URL to the inline style stack --}}
@if ($project->bannerUrl)
	@push('styles-inline')
		header.immersive-banner {
			background-image: url('{{ $project->bannerUrl }}');
		}
	@endpush
@endif

@section('infobar')
<section class="infobar">
	<div class="container">
		<ul class="list-inline">
			{{-- project language --}}
			@if ($project->language)
			<li class="list-inline-item">
				<i class="icon-gear"></i>

				{{ $project->language }}
			</li>
			@endif

			{{-- release counter --}}
			<li class="list-inline-item">
				<i class="icon-release"></i>

				<a href="{{ action('ProjectController@releases', [$project]) }}">
					{{ $project->releases->count(). ' '.str_plural('release', $project->releases->count()) }}
				</a>
			</li>

			{{-- maintainer counter --}}
			<li class="list-inline-item">
				<i class="icon-group"></i>

				<a href="#">
					{{ $project->maintainers->count(). ' '.str_plural('maintainer', $project->maintainers->count()) }}
				</a>
			</li>
		</ul>
	</div>
</section>
@endsection

@section('header-banner')
	{{-- show the project banner if applicable --}}
	@if ($project->bannerUrl)
		<header class="immersive immersive-banner">
	@else
		<header class="immersive">
	@endif
@endsection

@section('header')
@yield('header-banner')
	{{-- overlay to darken the banner image --}}
	<div class="overlay">
		<div class="container">
			<div class="title">
				@if ($project->doesLogoExist)
					<a href="{{ action('ProjectController@overview', [$project]) }}">
						<img src="{{ $project->logoUrl }}">
					</a>
				@else
					<a href="{{ action('ProjectController@overview', [$project]) }}">
						{{ $project->name }}
					</a>
				@endif
			</div>

			<nav>
				{{-- display project navigation items --}}
				@foreach (config('nav.project') as $item)
					{{-- compare the current route to this item to determine active state --}}
					<a href="{{ action($item['action'], [$project]) }}" class="{{ Route::currentRouteName() == $item['route'] ? 'item active': 'item' }}">
						{{ $item['text'] }}
					</a>
				@endforeach
			</nav>
		</div>

		{{-- display project info bar --}}
		@yield('infobar')
	</div>
</header>
@endsection