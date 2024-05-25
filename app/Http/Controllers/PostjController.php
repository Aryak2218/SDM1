<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Postj;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PostjController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $postj = Postj::latest()->paginate(5);

        //render view with posts
        return view('postj.index', compact('postj'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('postj.create');
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
            'gaji_pokok'          => 'required|min:3',
            'tunjangan_kesehatan'       => 'required|min:3',
            'tunjangan_transportasi' => 'required|min:3',

        ]);

        //create post
        postj::create([
            'gaji_pokok'          => $request->gaji_pokok,
            'tunjangan_kesehatan'       => $request->tunjangan_kesehatan,
            'tunjangan_transportasi' => $request->tunjangan_transportasi,
        ]);

        //redirect to index
        return redirect()->route('postj.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $postj = postj::findOrFail($id);

        //render view with post
        return view('postj.show', compact('postj'));
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
        $postj = postj::findOrFail($id);

        //render view with post
        return view('postj.edit', compact('postj'));
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
            'gaji_pokok'          => 'required|min:3',
            'tunjangan_kesehatan'       => 'required|min:3',
            'tunjangan_transportasi' => 'required|min:3',
        ]);
    
        //get post by ID
        $postj = postj::findOrFail($id);
    
        //update post with new data
        $postj->update([
            'gaji_pokok'          => $request->gaji_pokok,
            'tunjangan_kesehatan'       => $request->tunjangan_kesehatan,
            'tunjangan_transportasi' => $request->tunjangan_transportasi,

        ]);
    
        //redirect to index
        return redirect()->route('postj.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $postj = postj::findOrFail($id);


        //delete post
        $postj->delete();

        //redirect to index
        return redirect()->route('postj.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
