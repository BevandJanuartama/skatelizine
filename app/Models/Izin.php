<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis', 
        'nama', 
        'kelas', 
        'jurusan', 
        'wali_kelas', 
        'alasan',  
        'foto', 
        'validasi'
    ];
}
