@section('infobar')
<ul class="list-inline">
	<li class="list-inline-item">
		<i class="icon-gear"></i> ???
	</li>

	<li class="list-inline-item">
		<i class="icon-release"></i> {{ $project->releases->count(). ' '.str_plural('release', $project->releases->count()) }}
	</li>
</ul>
@endsection