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

        Arr::set(
            $data,
            'albums',
            Album::orderBy('last_photo_upload_at', 'desc')->paginate(10)
        );


        return view('main.index', compact('data'));
    }

}
