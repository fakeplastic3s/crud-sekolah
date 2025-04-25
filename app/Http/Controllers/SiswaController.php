<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index()
    {
        $data = [
            'siswa' => Siswa::all(),
            'kelas' => Kelas::all(),
        ];

        return view('siswa.index', $data);
    }

    function perkelas($id)
    {
        $data = [
            'siswa' => Siswa::where('kelas_id', $id)->get(),
            'kelas' => Kelas::find($id),
            'nama_kelas' => Kelas::find($id)->nama_kelas,
        ];

        return view('siswa.perkelas', $data);
    }

    function tambah()
    {
        $kelas = Kelas::all();
        return view('siswa.tambah', compact('kelas'));
    }

    function simpan(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'unique:siswa,nama|required',
                'nis' => 'unique:siswa,nis|required',
                'kelas_id' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'alamat' => 'required',
            ]
        );
        Siswa::create($validatedData);
        return redirect('/siswa')->with('flash_message', 'Data Berhasil Ditambahkan');
    }

    function edit($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $kelas = \App\Models\Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }
    function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->alamat = $request->alamat;
        $siswa->save();
        return redirect('/siswa')->with('flash_message', 'Data Berhasil Diubah');
    }
    function hapus($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('flash_message', 'Data Berhasil Dihapus');
    }
}
