<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photo\StorePhoto;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PhotosController extends Controller
{

    const SUCCESS = 1;
    const FAILED = 0;

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Request $request)
    {
        $album_id = $request->album_id;
        return view('photos.create', compact('album_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePhoto $request
     * @return JsonResponse
     */
    public function store(StorePhoto $request)
    {


        $files = $request->file('images');
        $captions = $request->captions;
        $album = Album::findOrFail($request->album_id);

        foreach ($files as $key => $file) {
            $image = Storage::disk('public')->put('/photos', $file);

            $album->photos()->create([
                'caption' => $captions[$key] ?? $file->getClientOriginalName(),
                'image' => $image,
            ]);
        };

        return response()->json(['code' => self::SUCCESS, 'msg' => 'Photos has been uploaded successfully', 'album_id' => $request->album_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Photo $photo
     * @return JsonResponse
     */
    public function destroy(Photo $photo)
    {

        $photo->deleteOrFail();

        return response()->json(['code' => self::SUCCESS, 'msg' => 'Photo has been deleted successfully']);
    }
}
