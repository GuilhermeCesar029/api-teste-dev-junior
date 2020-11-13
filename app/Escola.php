<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = [ 
        'nome',
    ];
    
    public function turmas(){
        return $this->hasMany('App\Turma');
    }
}
