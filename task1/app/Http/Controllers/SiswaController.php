<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required|numeric|min:8',
            'jurusan' => 'required',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('siswa.home')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(siswa $siswa, $id)
    {
        $siswa = Siswa::find($id);
        return view('siswas.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa $siswa, $id)
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required|numeric|min:8',
            'jurusan' => 'required',
        ]);
        Siswa::where('id', $id) -> update([
            'nis' => $request->nis,
            'name' => $request->name,
            'jurusan' => $request->jurusan,
        ]);
            return redirect()->route('siswa.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa $siswa, $id)
    {
        Siswa::where('id', $id)->delete();

        return redirect()->route('siswa.home')->with('deleted', 'Berhasil menghapus data!');
    }
}
