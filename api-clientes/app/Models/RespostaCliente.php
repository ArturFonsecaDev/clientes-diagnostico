<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespostaCliente extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'resposta_id'];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function resposta(){
        return $this->belongsTo(Resposta::class, 'resposta_id');
    }
}
