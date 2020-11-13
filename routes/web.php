<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Aluno;
use App\Escola;
use App\Turma;

//teste de relacionamento
Route::get('/teste', function(){ 
    $alunos = Aluno::all();

    if($alunos === 0){
        echo "nao tem alunos";
    }else{
        foreach($alunos as $a){
            echo "<p>" . $a->matricula . " - ". $a->nome . "-" . $a->turma_id . "</p>";
        }
    }
});
