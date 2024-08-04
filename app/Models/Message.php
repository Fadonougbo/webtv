<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public $fillable=['message','isOnline'];

    public function scopeIsOnline(Builder $builder) {
    
        return $builder->where('isOnline','=',true);
    }
}
