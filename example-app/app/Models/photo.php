<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'designacao'
    ];
    public function objeto(){
        return $this->belongsTo(Objeto::class);
    }
}
