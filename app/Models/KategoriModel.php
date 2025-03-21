<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori'; // Pastikan tabel di database benar
    protected $primaryKey = 'kategori_id'; 
    public $timestamps = true;

    protected $fillable = ['kategori_kode', 'kategori_nama'];
}