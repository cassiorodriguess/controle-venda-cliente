<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $fillable = [
    'quantidade','valor','id_produto','id_cliente','tipo_pg','status','parcelas','data_faturas' 
    ];
}
