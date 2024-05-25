<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Postz;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PostzController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $postz = Postz::latest()->paginate(5);

        //render view with posts
        return view('postz.index', compact('postz'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('postz.create');
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
            'jenjang_pendidikan'          => 'required|min:0',
            'institusi'       => 'required|min:3',
            'jurusan'       => 'required|min:3'

        ]);

        //create post
        Postz::create([
            'jenjang_pendidikan'          => $request->jenjang_pendidikan,
            'institusi'       => $request->institusi,
            'jurusan'       => $request->jurusan

        ]);

        //redirect to index
        return redirect()->route('postz.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $postz = postz::findOrFail($id);

        //render view with post
        return view('postz.show', compact('postz'));
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
        $postz = postz::findOrFail($id);

        //render view with post
        return view('postz.edit', compact('postz'));
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
            'jenjang_pendidikan'          => 'required|min:0',
            'institusi'       => 'required|min:3',
            'jurusan'       => 'required|min:3',

        ]);
    
        //get post by ID
        $postz = postz::findOrFail($id);
    
        //update post with new data
        $postz->update([
            'jenjang_pendidikan'    => $request->jenjang_pendidikan,
            'institusi'             => $request->institusi,
            'jurusan'               => $request->jurusan,

        ]);
    
        //redirect to index
        return redirect()->route('postz.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $postz = postz::findOrFail($id);


        //delete post
        $postz->delete();

        //redirect to index
        return redirect()->route('postz.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
