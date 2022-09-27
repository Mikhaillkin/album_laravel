<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\StoreAlbum;
use App\Http\Requests\Album\UpdateAlbum;
use App\Models\Album;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    const SUCCESS = 1;
    const FAILED = 0;


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {

        $data['albums'] = Album::where('user_id', Auth::user()->id)
            ->orderBy('last_photo_upload_at', 'desc')
            ->paginate(10);
        //зачем тут вообще понадобился массив data?

        return view('albums.index', compact('data'));
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
        // в этом нет необходимости. Нужное эксепшн будет выкинут если альбом не смог создаться.
        try {
            if (Album::create($request->validated())) {
                return response()->json(['code' => self::SUCCESS, 'msg' => 'New album has been created successfully']);
            }
        } catch (Exception $exception) {
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return View
     */
    public function show(Album $album)
    {
        $data['album'] = $album->load('photos');
//зачем тут data?
        return view('albums.show', compact('data'));
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
        try {
            if ($album->update($request->validated())) {
                return response()->json(['code' => self::SUCCESS, 'msg' => 'New album has been updated successfully']);
            }
        } catch (Exception $exception) {
            abort(500);
        }
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

        return response()->json(['code' => 1, 'msg' => 'Album has been deleted successfully']);
    }
}
