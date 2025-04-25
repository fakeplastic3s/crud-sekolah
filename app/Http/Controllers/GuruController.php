<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class GuruController extends Controller
{

    function index()
    {
        $data = [
            'guru' => Guru::all(),
            'kelas' =>  Kelas::all(),
        ];
        return view('guru.index', $data);
    }
    function perkelas($id)
    {
        $data = [
            'guru' => Guru::where('kelas_id', $id)->get(),
            'kelas' => Kelas::find($id),
            'nama_kelas' => Kelas::find($id)->nama_kelas,
        ];
        return view('guru.perkelas', $data);
    }

    function tambah()
    {
        $kelas = Kelas::all();
        return view('guru.tambah', compact('kelas'));
    }

    function simpan(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'unique:guru,nama|required',
                'nip' => 'unique:guru,nip|required',
                'kelas_id' => 'required',
            ]
        );
        Guru::create($validatedData);
        return redirect('/guru')->with('flash_message', 'Data Berhasil Ditambahkan');
    }

    function edit($id)
    {
        $guru = \App\Models\Guru::find($id);
        $kelas = \App\Models\Kelas::all();

        $data = [
            'guru' => Guru::find($id),
            'kelas' => Kelas::all(),
        ];
        return view('guru.edit', $data);
    }
    function update(Request $request, $id)
    {
        $guru = Guru::find($id);
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->kelas_id = $request->kelas_id;
        $guru->save();
        return redirect('/guru')->with('flash_message', 'Data Berhasil Diubah');
    }
    function hapus($id)
    {
        $guru = Guru::find($id);
        $guru->delete();
        return redirect('/guru')->with('flash_message', 'Data Berhasil Dihapus');
    }
}
