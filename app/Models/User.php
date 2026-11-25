<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'no_induk',   
        'nama',
        'kelas',
        'jurusan',
        'wali_kelas',
        'jk',
        'alamat',
        'password',
        'level',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Setter untuk mengenkripsi password secara otomatis
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Gunakan 'no_induk' sebagai identifier autentikasi
    public function getAuthIdentifierName()
    {
        return 'no_induk'; 
    }

    public function findForPassport($username)
    {
        return $this->where('no_induk', $username)->first();
    }
}
