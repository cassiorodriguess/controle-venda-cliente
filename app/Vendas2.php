<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas2 extends Model
{
    
    protected $fillable = [
        'valor','id_cliente','tipo_pg','status','parcelas','data_faturas' 
    ];
        
}
