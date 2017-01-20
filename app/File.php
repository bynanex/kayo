<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;

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
     * Get the MIME type of this file.
     *
     * @return string
     */
    public function getMimeTypeAttribute() {
        return Storage::disk('uploads')->mimeType($this->rawFilename);
    }

    /**
     * Format the file size to a human readable string.
     *
     * @return string
     */
    public function getFormattedSizeAttribute() {
        $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($this->size) - 1) / 3);
        
        return sprintf("%.2f", $this->size / pow(1024, $factor)). @$size[$factor];
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
