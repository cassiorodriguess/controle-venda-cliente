<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    protected $fillable = [
    'servico','descricao','valor','cliente_id','id_cliente'    
    ];
}
