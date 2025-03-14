<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        KategoriModel::create([
            'kategori_kode' => $request->kodekategori,
            'kategori_nama' => $request->namaKategori,
        ]);

        return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->update([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }
    public function dataTableAction($kategori)
    {
         return '<a href="'.route('kategori.edit', $kategori->id).'" class="btn btn-sm btn-warning">Edit</a>';
    }
     public function destroy($id)
     {
         try {
             $kategori = KategoriModel::findOrFail($id); // Pastikan kategori ditemukan
     
             $kategori->delete();
             return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
         } catch (\Exception $e) {
             Log::error('Error deleting kategori: ' . $e->getMessage());
             return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menghapus kategori');
         }
     }
}