<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objeto extends Model
{
    use HasFactory;
    public function photos()
    {
        return $this->hasMany(photo::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
