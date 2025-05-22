<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Services\ProductService;

class CompanyService {
    private CompanyRepository $companyRepository;
    private ProductService $productService;

    public function __construct(CompanyRepository $companyRepository, ProductService $productService) { #construtor
        $this->companyRepository = $companyRepository;
        $this->productService = $productService;
    }

    public function get() {
        return $this->companyRepository->get();
    }

    public function details(int $id) { #precisa de um id
        return $this->companyRepository->details($id);
    }

    public function store(array $data) { #precisa de dados
        return $this->companyRepository->store($data);
    }

    public function delete(int $id) {
        $company = $this->details($id);

        $products = $company->products;
        foreach($products as $product) {
            $this->productService->update($product->id, ["company_id"=>null]);
        }

        return $this->companyRepository->delete($id);
    }

    public function update(int $id, array $data) {
        return $this->companyRepository->update($id, $data);
    }

    public function getWithProducts() {
        return $this->companyRepository->getWithProducts();
    }

    public function findProducts(int $id) {
        return $this->companyRepository->findProducts($id);
    }
}

