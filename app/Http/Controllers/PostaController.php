<?php

namespace App\Http\Controllers;

use App\Models\posta; 

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostaController extends Controller
{    
    public function index(): View
    {
        $posta = posta::latest()->paginate(5); 

        return view('posta.index', compact('posta'));
    }

    public function create(): View
    {
        return view('posta.create');
    }
 
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'ussername' => 'required|min:3',
            'password' => 'required|min:3',
        ]);

        posta::create([
            'ussername' => $request->ussername,
            'password' => $request->password,
        ]);

        return redirect()->route('posta.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    public function show(string $id): View
    {
        $posta = posta::findOrFail($id);

        return view('posta.show', compact('posta'));
    }

    public function edit(string $id): View
    {
        $posta = posta::findOrFail($id);

        return view('posta.edit', compact('posta'));
    }
        
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'ussername' => 'required|min:3',
            'password' => 'required|min:3',
        ]);
    
        $posta = posta::findOrFail($id);
    
        $posta->update([
            'ussername' => $request->ussername,
            'password' => $request->password,
        ]);
    
        return redirect()->route('posta.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $posta = posta::findOrFail($id);

        $posta->delete();

        return redirect()->route('posta.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
