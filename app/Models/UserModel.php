<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\LevelModel;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';    
    protected $primaryKey = 'user_id';  
    protected $fillable = ['username', 'password', 'nama', 'level_id', 'created_ad', 'updated_ad'];
    protected $hidden = ['password']; 
    protected $casts = ['password' => 'hashed']; 
    
    //relasi ke tabel level
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}