<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Menampilkan semua data siswa
    public function index()
    {
        $siswas = Siswa::all();

        return view('siswa.index', compact('siswas'));
    }

    // Menampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Menyimpan data siswa
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

        Siswa::create($request->only([
            'nis',
            'nama',
            'jenis_kelamin',
            'kelas',
            'jurusan',
            'alamat',
            'no_hp',
        ]));

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('siswa.edit', compact('siswa'));
    }

    // Mengupdate data siswa
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
        ]);

        $siswa->update($request->only([
            'nis',
            'nama',
            'jenis_kelamin',
            'kelas',
            'jurusan',
            'alamat',
            'no_hp',
        ]));

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diubah');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}