<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Company;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','price','description','category_id', 'company_id'];

    public function category() { //Relacionamento 1 para N: um produto pode ter uma categoria
        return $this->belongsTo ( //a categoria que o produto pertence
            Category::class, //Qual a outro Model
            'category_id', //Qual a Chave que voce criou em Product
            'id' //Qual o nome da Chave na outra Model
        );
    }

    public function company() { //Relacionamento 1 para N: um produto pode ter uma empresa
        return $this->belongsTo (
            Company::class, 
            'company_id', 
            'id' 
        );
    }
}
