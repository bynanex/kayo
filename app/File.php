<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'filename';
    }

    /**
     * Get the filename as it is stored on the server.
     *
     * @return string
     */
    public function getRawFilenameAttribute() {
    	return $this->sha256sum.$this->extension;
    }

    /**
     * Check if this uploaded file exists.
     *
     * @return boolean
     */
    public function getExistsAttribute() {
    	return Storage::disk('uploads')->exists($this->rawFilename);
    }
}
