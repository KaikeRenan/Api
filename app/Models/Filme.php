<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $primaryKey = 'filme_id';
    protected $table = 'filmes';
    protected $fillable = ['filme_id','titulo','ano','duracao'];

    public function generos() {
        return $this->belongsToMany(CategoriaFilme::class, 'filmes_categorias', 'filme_id', 'categoria_id');
    }
}
