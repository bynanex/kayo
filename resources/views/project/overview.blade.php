@extends('templates.pages.project')

@section('content')
	<article>
		{!! Markdown::convertToHtml($project->description) !!}
	</article>
@endsection