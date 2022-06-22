<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class categories extends Model
{
    use HasFactory;

    //Criação da relação entre os modelos Categoria e Projeto

    public function Objeto(){
        return $this->hasMany(Objeto::class);
    }
}
