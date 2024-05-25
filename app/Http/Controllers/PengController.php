<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\pengguna;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class PengController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $pengguna = Post::latest()->paginate(5);

        //render view with posts
        return view('pengguna.index', compact('pengguna'));
    }
}