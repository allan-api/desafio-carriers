<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    
    protected $fillable = [
        'nome', 'sobrenome', 'idade', 'sexo'
    ];

    public function indexModel()
    {
        return self::paginate(10);
    }


    public function storeModel($request)
    {
            $funcionario = new Funcionario;
            $funcionario->fill($request->all());
            $funcionario->save();
        return $funcionario;
    }

    public function showModel($id)
    {
        $data = [
            'data' => $id
        ];
        return self::FindOrFail($data);
    }
    
    
    //falta fazer o restante daqui para baixo
    public function updateModel($request, $id)
    {
        $return = self::FindOrFail($id);
        $return->update($request->all());
        return 'sucess';
    }


    public function destroyModel($id)
    {
        $return = Funcionario::FindOrFail($id);
        $return->delete();
        return 'sucess';
    }

    public function estatisticasModel()
    {
            $qtdMasculino = count(DB::select("SELECT * FROM funcionarios WHERE sexo = 'masculino'"));
            $qtdFeminino  = count(DB::select("SELECT * FROM funcionarios WHERE sexo = 'feminino'"));
            $arrMediaFuncionarios = DB::select("SELECT avg(idade) FROM funcionarios");
            //foreach para remover as keys e limpar o json
            foreach ($arrMediaFuncionarios[0] as $key => $value) {
            }
            $mediaFuncionarios = floatval($value);
            $maxIdadeFuncionario = max(DB::select("SELECT idade FROM funcionarios"));
            //foreach para remover as keys e limpar o json
            foreach ($maxIdadeFuncionario as  $key => $value) {
                $FuncionarioMaisVelho = $value;
            }
            $minIdadeFuncionario = min(DB::select("SELECT idade FROM funcionarios"));
            //foreach para remover as keys e limpar o json
            foreach ($minIdadeFuncionario as  $key => $value) {
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
