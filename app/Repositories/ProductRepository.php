<?php

namespace App\Repositories; #localização lógica
use App\Models\Product; #importando a classe

# lida com dados

class ProductRepository {
    public function get() {
        return Product::all();
    }

    public function details(int $id) {
        return Product::findOrFail($id);
    }

    public function store(array $data) {
        return Product::create($data);
    }

    public function update(int $id, array $data) {
        // $product = Product::find($id);
        $product = $this->details($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id) {
        $product = $this->details($id);
        $product->delete();
        return $product;
    }

    public function getWithCategory() {
        // $product = $this->details($id); # this é uma referencia a própria classe
        // $category = $product->category;
        $product = Product::with('category')->get();
        return $product;
    }

    public function findCategory(int $id) {
        $product = $this->details($id); # this é uma referencia a própria classe
        return $product->category;
    }
}