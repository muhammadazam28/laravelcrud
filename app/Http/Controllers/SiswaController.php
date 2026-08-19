<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->get();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
        ]);

        Siswa::create($request->all());

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
        ]);

        $siswa->update($request->all());

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diubah.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
