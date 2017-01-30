<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Storage;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'name';
	}

	/**
	 * Get the projects owned by this user.
	 */
	public function projects()
	{
		return $this->hasMany('App\Project', 'author_id');
	}

	/**
	 * Get the projects this user is a maintainer of.
	 */
	public function maintains()
	{
		return $this->belongsToMany('App\Project', 'maintainers');
	}

	/**
	 * Get files uploaded by this user.
	 */
	public function files()
	{
		return $this->hasManyThrough('App\File', 'App\Release', 'author_id', 'uploader_id');
	}

	/**
	 * Check if this user has an avatar.
	 *
	 * @return boolean
	 */
	public function getDoesAvatarExistAttribute() {
		return Storage::disk('avatars')->exists($this->avatar);
	}

	/**
	 * Get a URL to the avatar for this user.
	 *
	 * @return string
	 */
	public function getAvatarUrlAttribute() {
		if (!$this->doesAvatarExist)
			return config('filesystems.disks.avatars.url').'/default.png';

		return config('filesystems.disks.avatars.url').'/'.$this->avatar;
	}
}
