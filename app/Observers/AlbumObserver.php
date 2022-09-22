<?php

namespace App\Observers;

use App\Models\Album;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AlbumObserver
{
    public function creating(Album $album)
    {

        $album->user_id = Auth::user()->id;
        $album->last_photo_upload_at = Carbon::now();

    }

    /**
     * Handle the Album "created" event.
     *
     * @param \App\Models\Album $album
     * @return void
     */
    public function created(Album $album)
    {
        //
    }

    /**
     * Handle the Album "updated" event.
     *
     * @param \App\Models\Album $album
     * @return void
     */
    public function updated(Album $album)
    {
        //
    }

    /**
     * Handle the Album "deleted" event.
     *
     * @param \App\Models\Album $album
     * @return void
     */
    public function deleted(Album $album)
    {
        //
    }

    /**
     * Handle the Album "restored" event.
     *
     * @param \App\Models\Album $album
     * @return void
     */
    public function restored(Album $album)
    {
        //
    }

    /**
     * Handle the Album "force deleted" event.
     *
     * @param \App\Models\Album $album
     * @return void
     */
    public function forceDeleted(Album $album)
    {
        //
    }
}
