<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RuanganController extends Controller
{
    public function index()
    {
        $data = Ruangan::all(); //menampilkan semua data ruangan
        $user = User::where('isAdmin', false)->get();
        return view('ruangan.index', 
        compact('data', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => ['required', 'string','min:5', 'max:50'],
            'kode_ruangan' => ['required', 'string','lowercase', 'max:10', 'unique:ruangan'],
            'ukuran' => ['required', 'string'],
            'id_user' => ['required', 'numeric'],
        ]);

        $simpan = [
            'nama_ruangan' => $request->input('nama_ruangan'),
            'kode_ruangan' => $request->input('kode_ruangan'),
            'id_user' => $request->input('id_user'),
            'ukuran' => $request->input('ukuran'),
        ];

        Ruangan::create($simpan);
        return back()->with('success', 'Ruangan berhasil dibuat');
    }

    public function detail($id)
    {
        $data = Ruangan::findOrFail($id);
        $user = User::where('isAdmin', false)->get();
        return view('ruangan.detail', 
        compact('data', 'user'));
    }

    public function update(Request $request, $id)
    {
        $data = Ruangan::findOrFail($id);
        $request->validate([
            'nama_ruangan' => ['required', 'string','min:5', 'max:50'],
            'kode_ruangan' => ['required', 'string','lowercase', 'max:10',
            Rule::unique('ruangan', 'kode_ruangan')->ignore($data->id, 'id')],
            'ukuran' => ['required', 'string'],
            'id_user' => ['required', 'numeric'],
        ]);
        
        $simpan = [
            'nama_ruangan' => $request->input('nama_ruangan'),
            'kode_ruangan' => $request->input('kode_ruangan'),
            'id_user' => $request->input('id_user'),
            'ukuran' => $request->input('ukuran'),
        ];

        $data->update($simpan);
        return back()->with('success', 'Data berhasil diperbarui');

    }

}
