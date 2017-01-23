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
		<header class="immersive">
			@yield('header')
		</header>
		
		<div class="container">
			<main>
				@foreach ($releases as $release)
				<div class="row">
					<div class="col-sm-12 col-lg-2 text-lg-right text-center">
						<section class="release-sidebar">
							<span class="badge {{ $release->badgeClass }}">
								<i class="icon-warning"></i> {{ $release->type }}
							</span>
						</section>
					</div>
					
					<div class="col">
						<section class="release-header text-lg-left text-center">
							{{ $release->name }} <span class="release-version">v{{ $release->version }}</span>

							<ul class="release-info list-inline text-muted">
								<li class="list-inline-item">
									<i class="icon-user"></i> {{ $release->author->display_name }}
								</li>

								<li class="list-inline-item">
									<i class="icon-clock"></i>

									<span title="{{ $release->created_at }}">
										{{ $release->created_at->diffForHumans() }}
									</span>
								</li>
							</ul>
						</section>

						<section class="release-description">
							<article>
								{!! Markdown::convertToHtml($release->description) !!}
							</article>
						</section>

						<section class="release-files">
							<ul>
								@foreach ($release->files as $file)
									<li>
										<div class="float-left">
											<i class="icon-release"></i>

											<a href="{{ action('ReleaseController@download', [$project, $release, $file]) }}">
												{{ $file->filename }}
											</a>
										</div>

										<div class="float-right text-muted">
											{{ $file->formattedSize }}
										</div>

										<div class="clearfix"></div>

										<div class="release-file-info text-muted">
											<b>SHA256:</b> {{ $file->sha256sum }}
											{{--
											@if ($file->signature)
											<b>Signed by:</b>

											<a href="{{ action('ReleaseController@signature', [$project, $release, $file]) }}">
												{{ $file->signed_by }} &mdash; <b>{{ $file->fingerprint }}</b>
											</a>
											@endif
											--}}
										</div>
									</li>
								@endforeach
							</ul>

							@if (!$loop->last)
							<hr>
							@endif
						</section>
					</div>
				</div>
				@endforeach
			</main>
			
			<footer>
				@yield('footer')
			</footer>
		</div>
	</body>
</html>