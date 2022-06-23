<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subregion extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function destination(){
        return $this->belongsTo(Destination::class);
    }
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function country(){
        return $this->hasMany(Country::class);
    }
}
