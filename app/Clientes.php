<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'nome','email','telefone','cpf','logradouro','numero','bairro','data_nascimento','cidade','complemento','cep','estado','identidade','cliente_id'
    ];

 }
