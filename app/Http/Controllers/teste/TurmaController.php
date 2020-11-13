<?php

namespace App\Http\Controllers\teste;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;

class TurmaController extends Controller
{
    public function adicionar(Request $request){
        try{
            $this->validate($request, [
                'data_inicio' => 'required',
                'data_final'  => 'required',
                'escola_id'   => 'required',
            ]);

            Turma::create($request->all());

            return ['return' => 'ok'];

        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function listar(){
        try{
            $turmas = Turma::all();

            return $turmas;
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function selecionar($id){
        try{
            $alunos = Turma::find($id);

            return $alunos;
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function atualizar(Request $request, $id){
        try{
            $turmas = $request->all();

            $this->validate($request, [
                'data_inicio' => 'required',
                'data_final'  => 'required',
                'escola_id'   => 'required',
            ]);

            Turma::find($id)->update($turmas);

            return ['return' => 'Atualizado com sucesso!', 'data' => $request->all()];
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function excluir($id){
        try{
            Turma::find($id)->delete();

            return ['return' => 'Excluido com sucesso!'];
        }catch(\Exception $erro){
            return ['return' => 'erro', 'detais' => $erro];
        }
    }
}
