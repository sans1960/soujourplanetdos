<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','image','description','date','tag_id','caption'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }
    public function article(){
        return $this->hasMany(Article::class);
    }
}
