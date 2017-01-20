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
     * Get the files assigned to this release.
     */
    public function files()
    {
        return $this->belongsToMany('App\File', 'release_files');
    }
}
