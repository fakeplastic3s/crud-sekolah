<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Siswa extends Controller
{
    function index()
    {
        $siswa = \App\Models\Siswa::all();
        $kelas = \App\Models\Kelas::all();

        return view('siswa.index', compact('siswa', 'kelas'));
    }

    function perkelas($id)
    {
        $siswa = \App\Models\Siswa::where('kelas_id', $id)->get();
        $kelas = \App\Models\Kelas::find($id);
        $nama_kelas = $kelas->nama_kelas;

        return view('siswa.perkelas', compact('siswa', 'nama_kelas'));
    }

    function tambah()
    {
        $kelas = \App\Models\Kelas::all();
        return view('siswa.tambah', compact('kelas'));
    }

    function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'unique:siswa,nama',
        ]);

        $siswa = new \App\Models\Siswa();
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect()->route('siswa.index');
    }

    function edit($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $kelas = \App\Models\Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }
    function update(Request $request, $id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect()->route('siswa.index');
    }
    function hapus($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->delete();

        return redirect()->route('siswa.index');
    }
}
