<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaFilme extends Model
{
    protected $table = 'cetegorias_filmes';
    protected $fillable = ['categoria_id','nome'];

    public function filmes() {
        return $this->belongsToMany(Filmes::class, 'filmes_categorias', 'categoria_id','filme_id');
    }
}
