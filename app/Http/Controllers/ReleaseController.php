<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Release;
use App\File;

use Response;

class ReleaseController extends Controller
{
	/**
	 * Download a file from a release.
	 *
	 * @return void
	 */
	public function download(Project $project, Release $release, File $file)
	{
		if (!$file->exists)
			return abort(404);

		return response()->download($file->path, $file->filename);
	}
	
	/**
	 * Download the detached PGP file signature.
	 *
	 * @return void
	 */
	public function signature(Project $project, Release $release, File $file)
	{
		if (!$file->exists || !$file->signature)
			return abort(404);

		return Response::make($file->signature, 200, [
			'Content-Type' => 'application/pgp-signature',
			'Content-Disposition' => sprintf('attachment; filename="%s"', $file->filename.'.sig'),
			'Content-Length' => strlen($file->signature)
		]);
	}
}