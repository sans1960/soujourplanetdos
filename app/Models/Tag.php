<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','image','description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function page(){
        return $this->hasMany(Page::class);
    }
}
