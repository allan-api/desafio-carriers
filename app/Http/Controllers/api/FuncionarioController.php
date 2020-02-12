<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Funcionario;
use DB;

class FuncionarioController extends Controller
{
    
    public function index()
    {
        return response()->json(Funcionario::paginate(10)); //10 funcionarios por pagina
    }


    public function store(Request $request)
    {
        Funcionario::create($request->all());

        $return = ['data'=> ['msg' => 'Usuário criado com sucesso!']];
        return response()->json($return, 201);
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

        return response()->json(['data' => ['msg' => 'Usuário atualizado com sucesso!']]);
    }
    
    
    public function destroy($id)
    {
        $return = Funcionario::FindOrFail($id);
        $return->delete();
        return response()->json(['data' => ['msg' => 'Usuário excluído com sucesso!']]);
    }

    public function estatisticas()
    {
        $qtdMasculino = count(DB::select("SELECT * FROM funcionarios WHERE sexo = 'masculino'"));
        $qtdFeminino  = count(DB::select("SELECT * FROM funcionarios WHERE sexo = 'feminino'"));
        $arrMediaFuncionarios = DB::select("SELECT avg(idade) FROM funcionarios");
        //foreachs para remover as keys
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

        $data = [
            'data' => [
                'Quantidade de funcionários do sexo masculino'  => $qtdMasculino,
                'Quantidade de funcionárias do sexo feminino'   => $qtdFeminino,
                'Média de idade dos funcionários(as)'           => $mediaFuncionarios,
                'Idade do funcionário(a) mais novo(a)'          => $funcionarioMaisNovo,
                'Idade do funcionário(a) mais velho(a)'         => $FuncionarioMaisVelho,

            ]
        ];
        return $data;
    }
}

