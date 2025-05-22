<?php

namespace App\Repositories; #localização lógica
use App\Models\Category; #importando a classe

# lida com dados

class CategoryRepository {
    public function get() {
        return Category::all();
    }

    public function details(int $id) {
        return Category::findOrFail($id);
    }

    public function store(array $data) {
        return Category::create($data);
    }

    public function update(int $id, array $data) {
        // $product = Product::find($id);
        $category = $this->details($id);
        $category->update($data);
        return $category;
    }

    public function delete(int $id) {
        $category = $this->details($id);
        $category->delete();
        return $category;
    }

    public function getWithProducts() {
        // $product = $this->details($id); # this é uma referencia a própria classe
        // $category = $product->category;
        $categories = Category::with('products')->get();
        return $categories;
    }

    public function findProducts(int $id) {
        $category = $this->details($id);
        return $category->products;
    }
}