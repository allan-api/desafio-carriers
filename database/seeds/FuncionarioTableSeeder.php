<?php

use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class FuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Funcionario::class, 20)->create();
    }
}
