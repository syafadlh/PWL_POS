<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\StorePostRequest;


class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create():View
    {
        return view('kategori.create');
    }
    public function store(StorePostRequest $request): RedirectResponse{
        // Jobsheet 6 - B Soal No 4 
        // $validatedData = $request->validate([
        //         'kategori_kode' => ['required', 'max:2'],
        //         'kategori_nama' => ['required', 'min:3'],
        //     ]);
        //     $validatedData = $request->validateWithBag('post', [
        //             'kategori_kode' => ['required', 'max:2'],
        //             'kategori_nama' => ['required', 'min:3'],
        //         ]);
        //         $validated = $request->validate([
        //                 'kategori_kode' => 'required',
        //                 'kategori_nama' => 'required',
        //             ]) ;

         // JOBSHEET 6 - B No 6
        // $validate = $request->validate([
        //     'kategori_kode' => 'bail|required|max:255',
        //     'kategori_nama' => 'required|min:10',
        // ]);

        // Jobsheet 6 - C No 2
        $validated = $request->validated();
        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

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