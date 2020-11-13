<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
        'data_inicio',
        'data_final',
        'escola_id',
    ];

    public function alunos(){
        return $this->hasMany('App\Aluno');
    }

    public function escola(){
        return $this->belongsTo('App\Escola');
    }
}
