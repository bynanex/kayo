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
	 * Get the absolute path to the file.
	 *
	 * @return string
	 */
	public function getPathAttribute() {
		return config('filesystems.disks.uploads.root').DIRECTORY_SEPARATOR.$this->rawFilename;
	}

	/**
	 * Format the file size to a human readable string.
	 *
	 * @return string
	 */
	public function getFormattedSizeAttribute() {
		$size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		$factor = floor((strlen($this->size) - 1) / 3);
		
		return sprintf("%.2f", $this->size / pow(1024, $factor)).@$size[$factor];
	}

	/**
	 * Check if this uploaded file exists.
	 *
	 * @return boolean
	 */
	public function getExistsAttribute() {
		return Storage::disk('uploads')->exists($this->rawFilename);
	}

	/**
	 * Get releases that use this file.
	 */
	public function releases()
	{
		return $this->belongsToMany('App\Release', 'release_files');
	}

	/**
	 * Get the user who uploaded this file.
	 */
	public function uploader()
	{
		return $this->belongsTo('App\User');
	}
}
