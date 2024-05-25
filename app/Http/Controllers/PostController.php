<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Post;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//pdf
use Barryvdh\DomPDF\Facade\pdf;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $posts = Post::all();

        //render view with posts
        return view('posts.index')->with('posts',$posts) ;
    }

    public function view_pdf()
    {
        $posts=Post::all();
        $pdf=Pdf::loadView('pdf.posts',['posts'=>$posts])-> setPaper("A4","landscape") ;
        return $pdf->download('posts.pdf');
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }
 
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama'          => 'required|min:3',
            'jabatan'       => 'required|min:3',
            'tanggal_masuk' => 'required|min:3',
            'alamat'        => 'required|min:3',
            'nomor_telepon' => 'required|min:3',
        ]);

        //create post
        Post::create([
            'nama'          => $request->nama,
            'jabatan'       => $request->jabatan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'alamat'        => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.show', compact('post'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.edit', compact('post'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama'          => 'required|min:3',
            'jabatan'       => 'required|min:3',
            'tanggal_masuk' => 'required|min:3',
            'alamat'        => 'required|min:3',
            'nomor_telepon' => 'required|min:3',
        ]);
    
        //get post by ID
        $post = Post::findOrFail($id);
    
        //update post with new data
        $post->update([
            'nama'          => $request->nama,
            'jabatan'       => $request->jabatan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'alamat'        => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);
    
        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);


        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
