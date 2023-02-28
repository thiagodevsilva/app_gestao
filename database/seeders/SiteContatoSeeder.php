<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 98765-4123';
        // $contato->email = 'sg@gmail.com';
        // $contato->motivo_contato = 1;
        // $contato->msg = 'Bem-vindo!';
        // $contato->save();

        SiteContato::factory()->count(48)->create();

    }
}
