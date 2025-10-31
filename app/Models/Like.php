<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'suka';

    protected $primaryKey = 'id_like';

    protected $fillable = [
        'id_like',
        'nik',
        'post_id',
        'like'
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }

    public function berita()
    {
        return $this->belogsTo(Post::class);
    }
}
