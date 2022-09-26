<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\StoreAlbum;
use App\Http\Requests\Album\UpdateAlbum;
use App\Models\Album;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {

        //arr::set и подобные конструкциии есть смысл использовать когда в них есть какая-то необходимость. Убрать, переписать на линейный код.
        Arr::set(
            $data,
            'albums',
            Album::where('user_id', Auth::user()->id)
                ->orderBy('last_photo_upload_at', 'desc')
                ->paginate(10)
        );


        return view('albums.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $albums = Album::all(); // для чего здесь необходим весь список альбомов?
        return view('albums.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlbum $request
     * @return JsonResponse
     */
    public function store(StoreAlbum $request)
    {

        if (Album::create($request->validated())) {
            return response()->json(['code' => 1, 'msg' => 'New album has been created successfully']);
        }

        // code = 1 - висячая константа. Не понятно, почему она один и что это означает.
        // вынести её в константы класса

        // здесь достаточно оставить создание и ответ после него.
        // создание если не получится - породить исключение
        return response()->json(['code' => 0, 'msg' => 'Error']);
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return View
     */
    public function show(Album $album)
    {

        //arr::set и подобные конструкциии есть смысл использовать когда в них есть какая-то необходимость. Убрать, переписать на линейный код.
        Arr::set(
            $data,
            'album',
            $album->load('photos')
        );

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
        // здесь достаточно оставить изменение и ответ после него.
        // создание если не получится - породить исключение
        if ($album->update($request->validated())) {
            return response()->json(['code' => 1, 'msg' => 'New album has been updated successfully']);
        }

        return response()->json(['code' => 0, 'msg' => 'Error']);
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
