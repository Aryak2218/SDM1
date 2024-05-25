<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\poste;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PosteController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $poste = poste::latest()->paginate(5);

        //render view with posts
        return view('poste.index', compact('poste'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('poste.create');
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
            'jenis_tunjangan'          => 'required|min:3',
            'nominal_tunjangan'       => 'required|min:3',

        ]);

        //create post
        poste::create([
            'jenis_tunjangan'          => $request->jenis_tunjangan,
            'nominal_tunjangan'       => $request->nominal_tunjangan,

        ]);

        //redirect to index
        return redirect()->route('poste.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $poste = poste::findOrFail($id);

        //render view with post
        return view('poste.show', compact('post'));
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
        $poste = poste::findOrFail($id);

        //render view with post
        return view('poste.edit', compact('poste'));
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
            'jenis_tunjangan'          => 'required|min:3',
            'nominal_tunjangan'       => 'required|min:3',

        ]);
    
        //get post by ID
        $poste = poste::findOrFail($id);
    
        //update post with new data
        $poste->update([
            'jenis_tunjangan'          => $request->jenis_tunjangan,
            'nominal_tunjangan'       => $request->nominal_tunjangan,

        ]);
    
        //redirect to index
        return redirect()->route('poste.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $poste = poste::findOrFail($id);


        //delete post
        $poste->delete();

        //redirect to index
        return redirect()->route('poste.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
