<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico_clientes extends Model
{
    protected $fillable = [
    'servicos','cliente_id','id_cliente','obs','total','status_pg','pago_com'    
    ];
}
