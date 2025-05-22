<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Certidao;

class Pessoa extends Model
{
    protected $primaryKey = 'cpf'; //Atributo CPF é uma chave primaria
    protected $table = 'pessoas';
    protected $fillable = ['cpf', 'nome', 'RG', 'data_nascimento'];

    public function certidao() {
        return $this->hasOne (
            Certidao::class, 'cpf', 'cpf'
        );
    }

    public function cartaoDeCretido() {
        return $this->hasMany (
            CartaoDeCretido::class, 'pessoa_cpf','cpf'
        );
    }
}
