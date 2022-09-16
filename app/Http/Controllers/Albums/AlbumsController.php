<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\StoreAlbum;
use App\Http\Requests\Album\UpdateAlbum;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->paginate(10);
        $randomPhoto = Photo::get();


        return view('albums.index',compact('albums','randomPhoto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();
        return view('albums.create',compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(StoreAlbum $request)
    {

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ];
        Album::create($data);

        return response()->json(['code'=>1,'msg'=>'New album has been created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $photos = Photo::with('album')->where('album_id', $album->id)->get()->all();

        $AuthorizedUserId = Auth::user()->id;

        return view('albums.show', compact('album','photos','AuthorizedUserId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbum $request,Album $album)
    {

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        $album->update($data);
        return response()->json(['code'=>1,'msg'=>'Album has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $photos = Photo::with('album')->where('album_id', $album->id)->get()->all();

        if(!empty($photos)) {
            foreach ($photos as $photo) {
                $photo->delete();
            }
        }


        $album->delete();

//        return redirect()->route('main.index',);
        return response()->json(['code'=>1,'msg'=>'Album has been deleted successfully']);
    }
}
