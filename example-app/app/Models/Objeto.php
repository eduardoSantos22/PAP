<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;
    public function photos(){
        return $this->hasMany(photo::class);
    }

    public function categories(){
        return $this->belongsTo(categories::class);
    }
}
