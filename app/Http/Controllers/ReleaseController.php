<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Release;
use App\File;

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
}
