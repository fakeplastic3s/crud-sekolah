<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    function index()
    {
        $kelas = Kelas::all();

        return view('kelas.index', compact('kelas'));
    }

    function tambah()
    {
        return view('kelas.tambah');
    }

    function simpan(Request $request)
    {

        $validatedData = $request->validate(
            [
                'nama_kelas' => 'unique:kelas,nama_kelas|required',
            ]
        );
        Kelas::create($validatedData);
        return redirect('/kelas')->with('flash_message', 'Data Berhasil Ditambahkan');
    }

    function edit($id)
    {
        $kelas = Kelas::find($id);

        return view('kelas.edit', compact('kelas'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'namakelas' => 'unique:kelas,nama_kelas',
        ]);

        $kelas = \App\Models\Kelas::find($id);
        $kelas->nama_kelas = $request->namakelas;
        $kelas->save();
        return redirect('/kelas')->with('flash_message', 'Data Berhasil Diubah');
    }
    function hapus($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas')->with('flash_message', 'Data Berhasil Dihapus');
    }
}
