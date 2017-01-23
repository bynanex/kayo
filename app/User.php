<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
