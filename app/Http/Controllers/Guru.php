<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Guru extends Controller
{
    function index()
    {
        $guru = \App\Models\Guru::all();
        $kelas = \App\Models\Kelas::all();

        return view('guru.index', compact('guru', 'kelas'));
    }

    function perkelas($id)
    {
        $guru = \App\Models\Guru::where('kelas_id', $id)->get();
        $kelas = \App\Models\Kelas::find($id);
        $nama_kelas = $kelas->nama_kelas;

        return view('guru.perkelas', compact('guru', 'nama_kelas'));
    }

    function tambah()
    {
        $kelas = \App\Models\Kelas::all();
        return view('guru.tambah', compact('kelas'));
    }

    function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'unique:guru,nama',
        ]);

        $guru = new \App\Models\Guru();
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->kelas_id = $request->kelas_id;
        $guru->save();
        \Session::flash('flash_message', 'Data Berhasil Ditambahkan');

        return redirect()->route('guru.index');
    }

    function edit($id)
    {
        $guru = \App\Models\Guru::find($id);
        $kelas = \App\Models\Kelas::all();

        return view('guru.edit', compact('guru', 'kelas'));
    }
    function update(Request $request, $id)
    {
        $guru = \App\Models\Guru::find($id);
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->kelas_id = $request->kelas_id;
        $guru->save();
        \Session::flash('flash_message', 'Data Berhasil Diubah');

        return redirect()->route('guru.index');
    }
    function hapus($id)
    {
        $guru = \App\Models\Guru::find($id);
        $guru->delete();
        \Session::flash('flash_message', 'Data Berhasil Dihapus');
        return redirect()->route('guru.index');
    }
}
