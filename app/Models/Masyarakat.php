<?php

namespace App\Models;

use App\Models\Pengaduan;
use App\Models\RatingApp;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Masyarakat extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'masyarakat';

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'tgl_bergabung',
        'nama',
        'username',
        'password',
        'telp',
        'foto',
        'ban',
        'email'
    ];

    protected $casts = [
        'tgl_bergabung' => 'datetime',
    ];

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function ratings()
    {
        return $this->hasMany(RatingApp::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
