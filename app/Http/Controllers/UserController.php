<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\LevelModel; // Tambahkan ini jika LevelModel digunakan
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user dengan informasi level
        $users = UserModel::with('level')->get();
        // return view('user.index', ['data' => $users]);
    }

    public function tambah()
    {
        $levels = LevelModel::all(); 
        return view('user_tambah', compact('levels'));
    }

    public function tambah_simpan(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:m_user,username',
            'nama' => 'required|string',
            'password' => 'required|min:6',
            'level_id' => 'required|exists:m_level,level_id',
        ]);

        // Simpan data user
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password), // Perbaikan
            'level_id' => $request->level_id,
        ]);

        return redirect('/user')->with('success', 'User berhasil ditambahkan!');
    }

    public function ubah($id)
    {
        $user = UserModel::findOrFail($id);
        $levels = LevelModel::all(); // Ambil level untuk dropdown
        return view('user.edit', compact('user', 'levels'));
    }

    public function ubah_simpan(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'username' => 'required|unique:m_user,username',
            'nama' => 'required|string',
            'password' => 'nullable|min:6', // Password boleh kosong saat edit
            'level_id' => 'required|exists:m_level,level_id',
        ]);

        // Update user
        $user->username = $request->username;
        $user->nama = $request->nama;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->level_id = $request->level_id;
        $user->save();

        return redirect('/user')->with('success', 'User berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect('/user')->with('success', 'User berhasil dihapus!');
    }
}
