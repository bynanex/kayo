<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Media;

class MediaController extends Controller
{
	/**
	 * View the media in a separate page.
	 *
	 * @return void
	 */
	public function view(Project $project, Media $media) {
		if (!$media->doesExist)
			return abort(404);

		return view('project.media.view', ['project' => $project, 'media' => $media]);
	}

	/**
	 * Force download a media file.
	 *
	 * @return void
	 */
	public function download(Project $project, Media $media)
	{
		if (!$media->doesExist)
			return abort(404);

		if ($media->isImage)
			return response()->download($media->path, $media->image_filename);

		if ($media->isVideo)
			return response()->download($media->path, $media->video_filename);
	}
}
