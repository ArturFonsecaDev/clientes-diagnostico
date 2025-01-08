<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = ['texto_resposta', 'categoria_id', 'pergunta_id'];

    public function pergunta(){
        return $this->belongsTo(Pergunta::class, 'pergunta_id');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
}
}
