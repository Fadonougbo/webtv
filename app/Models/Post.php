<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $fillable=['title','image','url','description','isOnline'];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function getSlug():string {
        
        return  str($this->title)->slug();
    }

    public function scopeIsOnline(Builder $builder) {
    
        return $builder->where('isOnline','=',true);
    }
}
