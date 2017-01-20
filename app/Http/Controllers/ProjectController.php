<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectController extends Controller
{
    /**
     * Displays a project page.
     *
     * @return void
     */
    public function view(Project $project)
    {
        return view('project.view', ['project' => $project]);
    }
}
