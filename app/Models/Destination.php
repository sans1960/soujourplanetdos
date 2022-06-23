<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function country(){
        return $this->hasMany(Country::class);
    }
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function subregion(){
        return $this->hasMany(Subregion::class);
    }
}
