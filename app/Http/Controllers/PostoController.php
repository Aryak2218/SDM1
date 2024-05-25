<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Posto;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PostoController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $posto = Posto::latest()->paginate(5);

        //render view with posts
        return view('posto.index', compact('posto'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('posto.create');
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
            'tanggal_pengajuan'          => 'required|min:0',
            'status'       => 'required|min:3',

        ]);

        //create post
        posto::create([
            'tanggal_pengajuan'          => $request->tanggal_pengajuan,
            'status'       => $request->status,

        ]);

        //redirect to index
        return redirect()->route('posto.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $posto = posto::findOrFail($id);

        //render view with post
        return view('posto.show', compact('posto'));
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
        $posto = posto::findOrFail($id);

        //render view with post
        return view('posto.edit', compact('posto'));
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
            'tanggal_pengajuan'          => 'required|min:0',
            'status'       => 'required|min:3',
        ]);
    
        //get post by ID
        $posto = posto::findOrFail($id);
    
        //update post with new data
        $posto->update([
            'tanggal_pengajuan'          => $request->tanggal_pengajuan,
            'status'       => $request->status,
        ]);
    
        //redirect to index
        return redirect()->route('posto.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $posto = posto::findOrFail($id);


        //delete post
        $posto->delete();

        //redirect to index
        return redirect()->route('posto.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
