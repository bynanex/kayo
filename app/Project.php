<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
	 * Get the releases assigned to this project.
	 */
	public function releases()
	{
		return $this->hasMany('App\Release');
	}
}
