<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_post';
    protected $fillable = [
        'id_post',
        'user_id',
        'tgl_post',
        'isi',
        'category',
        'foto',
        'judul',
      
     ];

     protected $casts = [
        'tgl_post' => 'datetime',
      ];

      public function user()
      {
          return $this->belongsTo(User::class);
      }
      public function likes()
      {
          return $this->hasMany(Like::class);
      }
     

}
