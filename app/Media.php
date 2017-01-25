<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
