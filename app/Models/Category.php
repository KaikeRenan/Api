<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','description'];

    public function products() { //Relacionamento 1 para N: categoria pode ter vários produtos
        return $this->hasMany ( //vários produtos tem uma categoria
            Product::class,
            'category_id',
            'id'
        );
    }
}
