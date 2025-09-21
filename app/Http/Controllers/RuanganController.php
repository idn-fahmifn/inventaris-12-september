<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $data = Ruangan::all();
        $user = User::where('isAdmin', false)->get();
        return view('ruangan.index', compact('data', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => ['required', 'string','min:5', 'max:50'],
            'kode_ruangan' => ['required', 'string','lowercase', 'max:10', 'unique:ruangan'],
            'ukuran' => ['required', 'string'],
            'id_user' => ['required', 'numeric'],
        ]);
    }

}
