<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;

class Certidao extends Model
{
    protected $primaryKey = 'numero';
    protected $table = 'certidoes';
    protected $fillable = ['numero', 'data', 'local','cpf'];

    public function pessoa() {
        return $this->belongsTo (
            Pessoa::class, 'cpf', 'cpf'
        );
    }
}
