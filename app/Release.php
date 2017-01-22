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
		return 'version';
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

	/**
	 * Get the badge style class for this release type.
	 *
	 * @return string
	 */
	public function getBadgeClassAttribute() {
		// See also: variables.less, releases.less.
		switch ($this->type) {
			case 'Stable':
				return 'release-badge-stable';
			case 'Experimental':
				return 'release-badge-experimental';
			case 'Nightly':
				return 'release-badge-nightly';
		}
	}
}
