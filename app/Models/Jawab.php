<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawab extends Model
{
    protected $table ='jawab';
    protected  $primaryKey ='id_jawab';
    protected $fillable = [
        
        'id_kepuasan',
        'user_id',
        'tgl_jawab',
      'jawab',
      'status',
    
     ];

    use HasFactory;
    protected $casts = [
        'tgl_jawab' => 'datetime',
      ];
    public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function rating()
     {
         return $this->belogsTo(RatingApp::class);
     }
}
