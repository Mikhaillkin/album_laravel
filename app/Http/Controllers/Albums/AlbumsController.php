<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\StoreAlbum;
use App\Http\Requests\Album\UpdateAlbum;
use App\Models\Album;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    const SUCCESS = 1;

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $albums = Album::where('user_id', Auth::user()->id)
            ->orderBy('last_photo_upload_at', 'desc')
            ->paginate(10);

        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlbum $request
     * @return JsonResponse
     */
    public function store(StoreAlbum $request)
    {
        Album::create($request->validated());

        return response()->json(['code' => self::SUCCESS, 'msg' => 'New album has been created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return View
     */
    public function show(Album $album)
    {
        $album = $album->load('photos');

        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Album $album
     * @return View
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAlbum $request
     * @param Album $album
     * @return JsonResponse
     */
    public function update(UpdateAlbum $request, Album $album)
    {
        $album->update($request->validated());

        return response()->json(['code' => self::SUCCESS, 'msg' => 'New album has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     * @return JsonResponse
     */
    public function destroy(Album $album)
    {
        $album->deleteOrFail();

        return response()->json(['code' => self::SUCCESS, 'msg' => 'Album has been deleted successfully']);
    }
}
