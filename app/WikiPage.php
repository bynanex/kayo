<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WikiPage extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'wiki';

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'slug';
	}

	/**
	 * Get the user who created this page.
	 */
	public function author()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the user who last edited this page.
	 */
	public function last_editor()
	{
		return $this->belongsTo('App\User');
	}
}
