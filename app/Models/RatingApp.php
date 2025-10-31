<?php

namespace App\Models;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatingApp extends Model
{
    use HasFactory;
    protected $table = 'rating';

    protected $fillable = [
        'nik',
        'id_kepuasan',
        'kepuasan',
        'rating',
        'tgl_komen'
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }

    public function jawabs()
    {
        return $this->hasMany(Jawab::class);
    }

    protected $casts = [
        'tgl_komen' => 'datetime',
    ];
}
