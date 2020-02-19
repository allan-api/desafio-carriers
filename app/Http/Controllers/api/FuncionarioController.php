<?php

namespace App\Http\Controllers\api;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Funcionario;
use DB;

class FuncionarioController extends Controller
{
    
    public function index()
    {
        try{
            return response()->json(Funcionario::paginate(10)); //10 funcionarios por pagina
        } catch(\Exception $e) {
            if(config('app.debug')) { //verifica se o debug está ativo
                return response()->json(ApiMessage::message($e->getMessage(), ''));
            } else {
                return response()->json(ApiMessage::message('Houve um erro ao realizar a operação', 500));
            }
        }
        
    }


    public function store(Request $request)
    {
        try {
            Funcionario::create($request->all());
    
            $return = ApiMessage::message('Funcionário criado com sucesso', 201);
            return response()->json($return, 201);
        }catch(\Exception $e) {
            if(config('app.debug')) { //verifica se o debug está ativo
                return response()->json(ApiMessage::message($e->getMessage(), ''));
            } else {
                return response()->json(ApiMessage::message('Houve um erro ao realizar a operação', 500));
            }
        }
    }

    public function show($id)
    {
        $data = [
            'data' => $id
        ];
        return Funcionario::FindOrFail($data);
    }


    public function update(Request $request, $id)
    {
        $return = Funcionario::FindOrFail($id);
        $return->update($request->all());

        return response()->json(ApiMessage::message('Funcionário atualizado com sucesso!', ''));
    }
    
    
    public function destroy($id)
    {
        $return = Funcionario::FindOrFail($id);
        $return->delete();
        return response()->json(ApiMessage::message('Funcionário excluído com sucesso!', ''));
    }

    public function estatisticas()
    {
        try {
        
            $qtdMasculino = count(DB::select("SELECT * FROM funcionarios WHERE sexo = 'masculino'"));
            $qtdFeminino  = count(DB::select("SELECT * FROM funcionarios WHERE sexo = 'feminino'"));
            $arrMediaFuncionarios = DB::select("SELECT avg(idade) FROM funcionarios");
            //foreachs para remover as keys e limpar o json
            foreach($arrMediaFuncionarios[0] as $key => $value) 
            {
                $mediaFuncionarios = floatval($value); 
            }
            $maxIdadeFuncionario = max(DB::select("SELECT idade FROM funcionarios")); 
            foreach($maxIdadeFuncionario as  $key => $value)
            {
                $FuncionarioMaisVelho = $value;
            }
            $minIdadeFuncionario = min(DB::select("SELECT idade FROM funcionarios"));
            foreach($minIdadeFuncionario as  $key => $value)
            {
                $funcionarioMaisNovo = $value;
            }
            //endpoint de estatísticas
            $data = [
                'data' => [
                    'Quantidade de funcionários do sexo masculino'  => $qtdMasculino,
                    'Quantidade de funcionárias do sexo feminino'   => $qtdFeminino,
                    'Média de idade dos funcionários(as)'           => $mediaFuncionarios,
                    'Idade do funcionário(a) mais novo(a)'          => $funcionarioMaisNovo,
                    'Idade do funcionário(a) mais velho(a)'         => $FuncionarioMaisVelho,

                ]
            ];
            if(isNull($data)):
                return Response()->json(ApiMessage::message('Nenhum funcionário cadastrado', 400));
            else:
                return response()->json($data);
            endif;

            } catch (\Exception $e) {
            if(config('app.debug')) {
                ApiMessage::message($e->getMessage(), '');
            } else {
                return response()->json('Houve um erro ao realizar a operação, certifique-se se há funcionário cadastrado ');
            }
        }

    }
}

