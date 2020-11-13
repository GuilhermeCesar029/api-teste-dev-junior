<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'nota',
        'turma_id',
    ];

    public function turma(){
        return $this->belongsTo('App\Turma');
    }
}
