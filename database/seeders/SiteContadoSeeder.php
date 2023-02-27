<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contato = new Contato();
        $contato->nome = '';
        $contato->telefone = '';
        $contato->email = '';
        $contato->motivoContato = '';
        $contato->msg = '';

    }
}
