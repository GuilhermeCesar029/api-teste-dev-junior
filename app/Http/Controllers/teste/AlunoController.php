<?php

namespace App\Http\Controllers\teste;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;

class AlunoController extends Controller
{
    
    public function adicionar(Request $request){
        try{
            $this->validate($request, [
                'nome'     => 'required',
                'email'    => 'required', 
                'telefone' => 'required',
                'nota'     => 'required', 
                'turma_id' => 'required',
            ]);

            Aluno::create($request->all());

            return ['return' => 'ok'];
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro]; 
        }
    }

    public function listar(){
        try{
            $alunos = Aluno::all();

            return $alunos;
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function selecionar($id){
        try{
            $alunos = Aluno::find($id);

            return $alunos;
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function atualizar(Request $request, $id){
        try{
            $alunos = $request->all();

            $this->validate($request, [
                'nome'     => 'required',
                'email'    => 'required', 
                'telefone' => 'required',
                'nota'     => 'required', 
                'turma_id' => 'required',
            ]);

            Aluno::find($id)->update($alunos);

            return ['return' => 'Atualizado com sucesso!', 'data' => $request->all()];
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function excluir($id){
        try{
            Aluno::find($id)->delete();

            return ['return' => 'Excluido com sucesso!'];
        }catch(\Exception $erro){
            return ['return' => 'erro', 'detais' => $erro];
        }
    }
}
