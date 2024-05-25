<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Postq;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PostqController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $postq = Postq::latest()->paginate(5);

        //render view with posts
        return view('postq.index', compact('postq'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('postq.create');
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
            'jenis_izin'          => 'required|min:0',
            'deskripsi'       => 'required|min:3',

        ]);

        //create post
        postq::create([
            'jenis_izin'          => $request->jenis_izin,
            'deskripsi'       => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('postq.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $postq = postq::findOrFail($id);

        //render view with post
        return view('postq.show', compact('postq'));
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
        $postq = postq::findOrFail($id);

        //render view with post
        return view('postq.edit', compact('postq'));
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
            'jenis_izin'          => 'required|min:0',
            'deskripsi'       => 'required|min:3',
        ]);
    
        //get post by ID
        $postq = postq::findOrFail($id);
    
        //update post with new data
        $postq->update([
            'jenis_izin'          => $request->jenis_izin,
            'deskripsi'       => $request->deskripsi,
        ]);
    
        //redirect to index
        return redirect()->route('postq.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $postq = postq::findOrFail($id);


        //delete post
        $postq->delete();

        //redirect to index
        return redirect()->route('postq.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
