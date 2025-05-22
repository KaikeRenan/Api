<?php

namespace App\Repositories; #localização lógica
use App\Models\Company; #importando a classe

# lida com dados

class CompanyRepository {
    public function get() {
        return Company::all();
    }

    public function details(int $id) {
        return Company::findOrFail($id);
    }

    public function store(array $data) {
        return Company::create($data);
    }

    public function update(int $id, array $data) {
        // $product = Product::find($id);
        $company = $this->details($id);
        $company->update($data);
        return $company;
    }

    public function delete(int $id) {
        $company = $this->details($id);
        $company->delete();
        return $company;
    }

    public function getWithProducts() {
        // $product = $this->details($id); # this é uma referencia a própria classe
        // $company = $product->company;
        $companies = Company::with('products')->get();
        return $companies;
    }

    public function findProducts($id) {
        $company = $this->details($id);
        return $company->products;
    }
}