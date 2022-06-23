<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['latitud','longitud','post_id','zoom'];
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
