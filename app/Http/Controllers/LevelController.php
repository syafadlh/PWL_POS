<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;

class LevelController extends Controller
{
    public function index()
    {
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return 'Insert data baru berhasil';

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    }

    public function tambah() {
        return view('level_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        // Validasi input
        $request->validate([
            'level_kode' => 'required|unique:m_level,level_kode',
            'level_nama' => 'required|string'
        ]);

        // Simpan data ke database
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        // Redirect ke halaman level
        return redirect()->route('level.tambah')->with('success', 'Level berhasil ditambahkan!');
    }
    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        // Simpan data ke database
        return redirect('/levels')->with('success', 'Level berhasil ditambahkan.');
    }
}