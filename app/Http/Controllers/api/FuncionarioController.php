<?php

namespace App\Http\Controllers\api;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Funcionario;
use DB;


class FuncionarioController extends Controller
{

    protected $funcionario;

    public function __construct(Funcionario $funcionario)
    {
        $this->funcionario = $funcionario;
    }

    public function index()
    {
        try {
            $funcionario = new Funcionario;
            return $funcionario->indexModel();
        } catch (\Exception $e) {
            if (config('app.debug')) { //verifica se o debug está ativo
                return response()->json(ApiMessage::message($e->getMessage(), ''));
            } else {
                return response()->json(ApiMessage::message('Houve um erro ao realizar a operação', 500));
            }
        }
    }


    public function store(Request $request)
    {
        try {
            $funcionario = new Funcionario;
            $funcionario->storeModel($request);
            $return = ApiMessage::message('Funcionário criado com sucesso', 201);
            return response()->json($return, 201);
        } catch (\Exception $e) {
            if (config('app.debug')) { //verifica se o debug está ativo
                return response()->json(ApiMessage::message($e->getMessage(), ''));
            } else {
                return response()->json(ApiMessage::message('Houve um erro ao realizar a operação', 500));
            }
        }
    }
    
    public function show($id)
    {
        try {
            $funcionario = new Funcionario;
            return response()->json($funcionario->showModel($id));
        } catch (\Exception $e) {
            if (config('app.debug')) { //verifica se o debug está ativo
                return response()->json(ApiMessage::message($e->getMessage(), ''));
            } else {
                return response()->json(ApiMessage::message('Houve um erro ao realizar a operação', 500));
            }
        }
    }
    
    
    public function update(Request $request, $id)
    {
        try {
            $funcionario = new Funcionario;
            $resp = $funcionario->updateModel($request, $id);
            if($resp == "sucess"){
                return response()->json(ApiMessage::message('Funcionário atualizado com sucesso!', ''));
            }
        } catch (\Exception $e) {
            if (config('app.debug')) { //verifica se o debug está ativo
                return response()->json(ApiMessage::message($e->getMessage(), ''));
            } else {
                return response()->json(ApiMessage::message('Houve um erro ao realizar a operação', 500));
            }
        }
    }
    
    
    public function destroy($id)
    {
        try {
            $funcionario = new Funcionario;
            $resp = $funcionario->destroyModel($id);
            if($resp == "sucess"){
                return response()->json(ApiMessage::message('Funcionário excluído com sucesso!', ''));
            }
        } catch (\Exception $e) {
            if (config('app.debug')) { //verifica se o debug está ativo
                return response()->json(ApiMessage::message($e->getMessage(), ''));
            } else {
                return response()->json(ApiMessage::message('Houve um erro ao realizar a operação', 500));
            }
        }
    }
        
        public function estatisticas()
    {
        try {
            $funcionario = new Funcionario;
            $data = $funcionario->estatisticasModel();
            
            return response()->json($data);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                ApiMessage::message($e->getMessage(), '');
            } else {
                return response()->json('Houve um erro ao realizar a operação, certifique-se se há funcionário cadastrado ');
            }
        }
    }
}
