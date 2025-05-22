<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['social_reason', 'fantasy_name', 'cnpj'];

    public function products() { //Relacionamento 1 para N: uma empresa pode ter vários produtos
        return $this->hasMany (
            Product::class,
            'company_id',
            'id'
        );
    }
}
