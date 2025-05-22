<?php

namespace App\Services; #localização lógica
use App\Repositories\ProductRepository; #importando o repositório

# lida com validações, regras

class ProductService {
    private ProductRepository $productRepository; #apenas service chama o repository

    public function __construct(ProductRepository $productRepository) { #construtor
        $this->productRepository = $productRepository;
    }

    public function get() {
        $products = $this->productRepository->get();
        return $products;
    }

    public function details(int $id) {
        return $this->productRepository->details($id);
    }

    public function store(array $data) {
        return $this->productRepository->store($data);
    }

    public function update($id, $data) {
        return $this->productRepository->update($id, $data);
    }

    public function delete(int $id) {
        return $this->productRepository->delete($id);
    }

    public function getWithCategory() {
        return $this->productRepository->getWithCategory();
    }

    public function findCategory(int $id) {
        return $this->productRepository->findCategory($id);
    }
}

