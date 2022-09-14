<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photo\StorePhoto;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//use Illuminate\Validation\Validator;


class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        dd($request->album_id);
        $album_id = $request->album_id;
        return view('photos.create',compact('album_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhoto $request)
    {

//        dd($request->file('images'));

        //        $validator = Validator::make($request->all(),[
//            'image' => 'required|image',
//            'caption' => 'required|string'
//        ]);
//        dd($request->all());
//        dd(1111111111111111);
//        if(!$validator->passes()) {
//            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
//        } else {
//            $path = 'files/';
//            $file = $request->file('image');
//            $file_name = time().'_'.$file->getClientOriginalName();
//
//            $upload = $file->storeAs($path,$file_name);
//
//            if($upload){
//                return response()->json(['code',1,'msg'=>'New image has been saved successfully']);
//            };
//        }
//        dd($request->caption);
//        dd($request->file('image'));
//        $path = 'public/photos/';

        $files = $request->file('images');
        foreach ($files as $file) {
            $image = Storage::disk('public')->put('/photos', $file);
            $album = Album::find($request->album_id);
            $album_id = $request->album_id;

            if($image && is_numeric($album_id)){
                Photo::create([
                    'caption' => $file->getClientOriginalName(),
                    'image' => Storage::url($image),
                    'album_id' => $album_id,
                ]);

            $album->update([ 'updated_at' => now() ]);

        }

//        $file = $request->file('image');
//        $file_name = time().'_'.$file->getClientOriginalName();
//
//        $image = $file->storeAs($path,$file_name);

//        $file = $request->file('image');
//        $image = Storage::disk('public')->put('/photos', $file);
//        $album = Album::find($request->album_id);
//
//        if($image){
//            Photo::create([
//                'caption' => $request->caption,
//                'image' => Storage::url($image),
//                'album_id' => $request->album_id,
//            ]);
//
//            $album->update([ 'updated_at' => now() ]);
//
////            return response()->json(['code'=>1,'msg'=>'New image has been saved successfully']);
//            return redirect()->back();
        };

//        return redirect()->route('albums.show',$album_id);
        return response()->json(['code'=>1,'msg'=>'Photos has been uploaded successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return response()->json(['code'=>1,'msg'=>'Photo has been deleted successfully']);
//        return redirect()->back();
    }
}
