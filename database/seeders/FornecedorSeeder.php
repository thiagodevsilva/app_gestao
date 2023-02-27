<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;


class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'f100.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'f100@gmail.com';
        $fornecedor->save();

        // metodo create (atencao para o fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'f200.com.br',
            'uf' => 'RJ',
            'email' => 'f200@gmail.com',
        ]);

        // insert
        // DB::table('fornecedores')->insert([
        //     'nome' => 'Fornecedor 300',
        //     'site' => 'f300.com.br',
        //     'uf' => 'MS',
        //     'email' => 'f300@gmail.com',
        // ]);

    }
}
