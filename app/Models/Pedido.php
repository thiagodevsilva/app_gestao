<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos() {
        // 
        // return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');

        /**
         * 1- Modelo do relcionamento NxN em relação o modelo que estamos implementando
         * 2- É a tabela auxiliar que armazena os registros de relacionamento
         * 3- Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamentos
         * 4- Representa o nome da FK ta tabela mapeada pelo model utilizado no relacionamento
         */
        
        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at', 'quantidade');
    }
}
