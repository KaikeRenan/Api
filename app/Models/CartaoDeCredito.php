<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;

class CartaoDeCredito extends Model
{
    protected $primaryKey = 'numero';
    protected $table = 'cartoesDeCredito';
    protected $fillable = ['numero','validade','cvv'];

    public function pessoa() {
        return $this->belongsTo (
            Pessoa::class, 'pessoaCpf', 'cpf' //chave das outra classe
        );
    }
}  
