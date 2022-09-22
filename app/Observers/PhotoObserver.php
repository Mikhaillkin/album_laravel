<?php

namespace App\Observers;

use App\Models\Album;
use App\Models\Photo;

class PhotoObserver
{

    public function creating(Photo $photo)
    {
        $album = Album::findOrFail($photo->album_id);
        $album->update(['last_photo_upload_at' => now()]);
    }

    /**
     * Handle the Photo "created" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function created(Photo $photo)
    {
        //
    }


    public function updating()
    {

    }

    /**
     * Handle the Photo "updated" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function updated(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "deleted" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function deleted(Photo $photo)
    {
        $album = Album::findOrFail($photo->album_id);
        $album->update(['last_photo_upload_at' => now()]);
    }

    /**
     * Handle the Photo "restored" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function restored(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "force deleted" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function forceDeleted(Photo $photo)
    {
        //
    }
}
