<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = [
    'titulo','descricao','preco','valor','categoria','fornecedor','estoque','cliente_id'    
    ];
}
