<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Postm;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PostmController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $postm = Postm::latest()->paginate(5);

        //render view with posts
        return view('postm.index', compact('postm'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('postm.create');
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
            'tanggal_absensi'          => 'required|min:0',
            'jam_masuk'       => 'required|min:0',
            'jam_pulang' => 'required|min:0',

        ]);

        //create post
        postm::create([
            'tanggal_absensi'          => $request->tanggal_absensi,
            'jam_masuk'       => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
        ]);

        //redirect to index
        return redirect()->route('postm.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $postm = postm::findOrFail($id);

        //render view with post
        return view('postm.show', compact('postm'));
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
        $postm = postm::findOrFail($id);

        //render view with post
        return view('postm.edit', compact('postm'));
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
            'tanggal_absensi'          => 'required|min:0',
            'jam_masuk'       => 'required|min:0',
            'jam_pulang' => 'required|min:0',
        ]);
    
        //get post by ID
        $postm = postm::findOrFail($id);
    
        //update post with new data
        $postm->update([
            'tanggal_absensi'          => $request->tanggal_absensi,
            'jam_masuk'       => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,

        ]);
    
        //redirect to index
        return redirect()->route('postm.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $postm = postm::findOrFail($id);


        //delete post
        $postm->delete();

        //redirect to index
        return redirect()->route('postm.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
