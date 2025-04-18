<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kelas extends Controller
{
    function index()
    {
        $kelas = \App\Models\Kelas::all();

        return view('kelas.index', compact('kelas'));
    }

    function tambah()
    {
        return view('kelas.tambah');
    }

    function simpan(Request $request)
    {
        $request->validate([
            'namakelas' => 'unique:kelas,nama_kelas',
        ]);

        $kelas = new \App\Models\Kelas();
        $kelas->nama_kelas = $request->namakelas;
        $kelas->save();
        \Session::flash('flash_message', 'Data Berhasil Ditambahkan');

        return redirect()->route('kelas.index');
    }

    function edit($id)
    {
        $kelas = \App\Models\Kelas::find($id);

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
        \Session::flash('flash_message', 'Data Berhasil Diubah');

        return redirect()->route('kelas.index');
    }
    function hapus($id)
    {
        $kelas = \App\Models\Kelas::find($id);
        $kelas->delete();
        \Session::flash('flash_message', 'Data Berhasil Dihapus');

        return redirect()->route('kelas.index');
    }
}
