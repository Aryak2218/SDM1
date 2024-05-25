<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Postx;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PostxController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $postx = Postx::latest()->paginate(5);

        //render view with posts
        return view('postx.index', compact('postx'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('postx.create');
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
            'nama_pelatihan'          => 'required|min:3',
            'tanggal_pelatihan'       => 'required|min:3',
            'lokasi_pelatihan' => 'required|min:3',

        ]);

        //create post
        postx::create([
            'nama_pelatihan'          => $request->nama_pelatihan,
            'tanggal_pelatihan'       => $request->tanggal_pelatihan,
            'lokasi_pelatihan' => $request->lokasi_pelatihan,
        ]);

        //redirect to index
        return redirect()->route('postx.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $postx = postx::findOrFail($id);

        //render view with post
        return view('postx.show', compact('postx'));
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
        $postx = postx::findOrFail($id);

        //render view with post
        return view('postx.edit', compact('postx'));
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
            'nama_pelatihan'          => 'required|min:3',
            'tanggal_pelatihan'       => 'required|min:3',
            'lokasi_pelatihan' => 'required|min:3',
        ]);
    
        //get post by ID
        $postx = postx::findOrFail($id);
    
        //update post with new data
        $postx->update([
            'nama_pelatihan'          => $request->nama_pelatihan,
            'tanggal_pelatihan'       => $request->tanggal_pelatihan,
            'lokasi_pelatihan' => $request->lokasi_pelatihan,

        ]);
    
        //redirect to index
        return redirect()->route('postx.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $postx = postx::findOrFail($id);


        //delete post
        $postx->delete();

        //redirect to index
        return redirect()->route('postx.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
