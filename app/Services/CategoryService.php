<?php

namespace App\Services; #localização lógica
use App\Repositories\CategoryRepository; #importando o repositório
use App\Repositories\ProductRepository;

# lida com validações, regras

class CategoryService {
    private CategoryRepository $categoryRepository; #apenas service chama o repository
    private ProductService $productService;

    public function __construct(CategoryRepository $categoryRepository, ProductService $productService) { #construtor
        $this->categoryRepository = $categoryRepository;
    }

    public function get() {
        $categories = $this->categoryRepository->get();
        return $categories;
    }

    public function details(int $id) {
        return $this->categoryRepository->details($id);
    }

    public function store(array $data) {
        return $this->categoryRepository->store($data);
    }

    public function update($id, $data) {
        return $this->categoryRepository->update($id, $data);
    }

    // public function delete(int $id) {
    //     $category = $this->details($id);
    //     $category->products()->delete(); #apaga produto tbm
    //     return $this->categoryRepository->delete($id);
    // }

    public function delete(int $id) {
        $category = $this->details($id);
        $products = $category->products; #gera uma lista de produtos

        // dd($products);

        foreach($products as $products) { #analisa cada um por vez
            $this->productService->delete($products->id);
        }

        return $this->categoryRepository->delete($id);
    }

    public function getWithProducts() {
        return $this->categoryRepository->getWithProducts();
    }

    public function findProducts(int $id) {
        return $this->categoryRepository->findProducts($id);
    }
}

