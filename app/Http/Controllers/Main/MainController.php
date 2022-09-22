<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {

//        dd(Album::all()->photos());

        Arr::set(
            $data,
            'albums',
            Album::orderBy('last_photo_upload_at','desc')->paginate(10)
        );


//        dd($data['albums']);

        return view('main.index',compact('data'));
    }

}
