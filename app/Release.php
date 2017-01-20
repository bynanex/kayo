<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'slug';
	}

	/**
	 * Get the user who created this release.
	 */
	public function author()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the project this release belongs to.
	 */
	public function project()
	{
		return $this->belongsTo('App\Project');
	}

	/**
	 * Get the files assigned to this release.
	 */
	public function files()
	{
		return $this->belongsToMany('App\File', 'release_files');
	}
}
