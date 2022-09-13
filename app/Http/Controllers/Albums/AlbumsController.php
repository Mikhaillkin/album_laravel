<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
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
//        foreach($album->photos->where('album_id',$album->id)->random(1) as $photo) {};
//        dd($albums);

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
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ];
        Album::create($data);
//        $albums = Album::all();


//        Photo::create([
//            'caption' => $request->caption,
//            'image' => $upload,
//            'album_id' => $request->album_id,
//        ]);
//
//        return response()->json(['code'=>1,'msg'=>'New image has been saved successfully']);


//        return redirect(route( 'albums.index'));
//        return view('albums.create',compact('albums'));
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
    public function update(Request $request,Album $album)
    {

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

//        dd($album);
        $album->update($data);
//        return redirect()->route('albums.show',$album->id);
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('main.index',);
    }
}
