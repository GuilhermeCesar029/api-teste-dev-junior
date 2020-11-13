<?php

namespace App\Http\Controllers\teste;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Escola;

class EscolaController extends Controller
{
    public function adicionar(Request $request){
        try{
            $this->validate($request, [
                'nome' => 'required',
            ]);

            Escola::create($request->all());

            return ['return' => 'ok'];

        }catch(\Exception $erro){            
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function listar(){
        try{
            $escolas = Escola::all();

            return $escolas;
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function selecionar($id){
        try{
            $escolas = Escola::find($id);

            return $escolas;
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function atualizar(Request $request, $id){
        try{
            $escolas = $request->all();

            $this->validate($request, [
                'nome' => 'required',
            ]);

            Escola::find($id)->update($escolas);

            return ['return' => 'Atualizado com sucesso!', 'data' => $request->all()];
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }

    public function excluir($id){
        try{
            Escola::find($id)->delete();

            return ['return' => 'Excluido com sucesso!'];
        }catch(\Exception $erro){
            return ['return' => 'erro', 'detais' => $erro];
        }
    }
}
