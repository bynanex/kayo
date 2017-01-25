<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;

class Media extends Model
{
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
	 * Get the absolute path to the thumbnail image.
	 *
	 * @return string
	 */
	public function getThumbnailPathAttribute() {
		return config('filesystems.disks.media.root').DIRECTORY_SEPARATOR.$this->thumbnail;
	}

	/**
	 * Get the absolute path to the image file.
	 *
	 * @return string
	 */
	public function getImagePathAttribute() {
		return config('filesystems.disks.media.root').DIRECTORY_SEPARATOR.$this->image_filename;
	}

	/**
	 * Get the absolute path to the video file.
	 *
	 * @return string
	 */
	public function getVideoPathAttribute() {
		return config('filesystems.disks.media.root').DIRECTORY_SEPARATOR.$this->video_filename;
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
	 * Get the public URL to the thumbnail image.
	 *
	 * @return string
	 */
	public function getThumbnailURLAttribute() {
		if (!$this->doesThumbnailExist)
			if ($this->isImage)
				return config('filesystems.disks.media.url').'/thumbnails/default_image.png';
			else if ($this->isVideo)
				return config('filesystems.disks.media.url').'/thumbnails/default_video.png';

		return config('filesystems.disks.media.url').'/thumbnails/'.$this->thumbnail.'.jpg';
	}

	/**
	 * Get the public URL to the image file.
	 *
	 * @return string
	 */
	public function getImageURLAttribute() {
		return config('filesystems.disks.media.url').'/'.$this->image_filename;
	}

	/**
	 * Get the public URL to the video file.
	 *
	 * @return string
	 */
	public function getVideoURLAttribute() {
		return config('filesystems.disks.media.url').'/'.$this->video_filename;
	}
}
