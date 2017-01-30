@extends('templates.pages.project')

@section('title', $project->name)

@section('content')
	<article>
		{!! Markdown::convertToHtml($project->description) !!}
	</article>
@endsection