<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $data = [];
        $data['albums'] = Album::with('photos')->orderBy('updated_at','desc')->paginate(10);
        $data['randomPhoto'] = Photo::get();

        return view('main.index',compact('data'));
    }

}
