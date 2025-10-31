<?php

namespace App\Models;

use App\Models\User;
use App\Models\Coments;
use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapan';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
    public function komens()
    {
        return $this->hasMany(Coments::class);
    }
    protected $casts = [
        'tgl_tanggapan' => 'datetime',
      ];
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = [
        
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'proses',
        'user_id'
    ];

   


}
