@section('infobar')
<section class="infobar">
	<div class="container">
		<ul class="list-inline">
			<li class="list-inline-item">
				<i class="icon-gear"></i> {{ $project->language }}
			</li>
			
			<li class="list-inline-item">
				<i class="icon-release"></i> {{ $project->releases->count(). ' '.str_plural('release', $project->releases->count()) }}
			</li>
		</ul>
	</div>
</section>
@endsection

@section('header')
<header class="immersive" style="background-image: url('http://placekitten.com/1280/720');">
	<div class="overlay">
		<div class="container">
			<div class="float-left">
				{{ $project->name }}
			</div>

			<nav class="float-right">
				<a href="{{ action('ProjectController@view', [$project]) }}" class="item active">Overview</a>
				<a href="{{ action('ProjectController@releases', [$project]) }}" class="item">Releases</a>
			</nav>

			<div class="clearfix"></div>
		</div>

		@yield('infobar')
	</div>
</header>
@endsection