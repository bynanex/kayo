<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;

class Media extends Model
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
	 * Get the user who uploaded this media.
	 */
	public function uploader()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Determines whether this media object is an image.
	 *
	 * @return boolean
	 */
	public function getIsImageAttribute() {
		return $this->image_filename !== null;
	}

	/**
	 * Determines whether this media object is a video.
	 *
	 * @return boolean
	 */
	public function getIsVideoAttribute() {
		return $this->video_filename !== null;
	}

	/**
	 * Check if this uploaded media file exists.
	 *
	 * @return boolean
	 */
	public function getDoesExistAttribute() {
		if ($this->isImage)
			return Storage::disk('media')->exists($this->image_filename);

		if ($this->isVideo)
			return Storage::disk('media')->exists($this->video_filename);

		return false;
	}

	/**
	 * Check if the thumbnail for this uploaded media exists.
	 *
	 * @return boolean
	 */
	public function getDoesThumbnailExistAttribute() {
		if ($this->thumbnail === null)
			return false;
		
		return Storage::disk('media')->exists('thumbnails/'.$this->thumbnail.'.jpg');
	}

	/**
	 * Get the absolute path to the image or video file.
	 *
	 * @return string
	 */
	public function getPathAttribute() {
		return config('filesystems.disks.media.root').DIRECTORY_SEPARATOR.($this->isImage ? $this->image_filename: $this->video_filename);
	}

	/**
	 * Get the absolute path to the thumbnail image.
	 *
	 * @return string
	 */
	public function getThumbnailPathAttribute() {
		return config('filesystems.disks.media.root').DIRECTORY_SEPARATOR.$this->thumbnail;
	}

	/**
	 * Get the public URL to the media file.
	 *
	 * @return string
	 */
	public function getURLAttribute() {
		return config('filesystems.disks.media.url').'/'.($this->isImage ? $this->image_filename: $this->video_filename);
	}

	/**
	 * Get the public URL to the thumbnail image.
	 *
	 * @return string
	 */
	public function getThumbnailURLAttribute() {
		if (!$this->doesThumbnailExist)
			if ($this->isVideo)
				return config('filesystems.disks.media.url').'/thumbnails/default_video.png';
			else
				return config('filesystems.disks.media.url').'/thumbnails/default_image.png';

		return config('filesystems.disks.media.url').'/thumbnails/'.$this->thumbnail.'.jpg';
	}

	/**
	 * Get the mime type of the media file.
	 *
	 * @return string
	 */
	public function getMimeTypeAttribute() {
		if (!$this->doesExist)
			return '';
		
		return Storage::disk('media')->mimeType($this->isImage ? $this->image_filename: $this->video_filename);
	}
}
