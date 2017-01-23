<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;

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
	 * Get the user who created this project.
	 */
	public function author()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the releases assigned to this project.
	 */
	public function releases()
	{
		return $this->hasMany('App\Release');
	}

	/**
	 * Get the maintainers of this project.
	 */
	public function maintainers()
	{
		return $this->belongsToMany('App\User', 'maintainers');
	}

	/**
	 * Get the banner URL for this project.
	 *
	 * @return string
	 */
	public function getBannerUrlAttribute() {
		if (!Storage::disk('banners')->exists($this->banner.'.jpg'))
			return;

		return config('filesystems.disks.banners.url').'/'.$this->banner.'.jpg';
	}
}
