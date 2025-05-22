<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Repositories\CompanyRepository;
use App\Http\Resources\CompanyResource;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Resources\ProductResource;   
use Illuminate\Database\Eloquent\ModelNotFoundException;

# lida com requisições

class CompanyController extends Controller
{
    private CompanyService $companyService; # apenas controller chama o service

    public function __construct(CompanyService $companyService) { # construtor
        $this->companyService = $companyService;
    }

    public function get() {
        $companies = $this->companyService->get();
        return CompanyResource::collection($companies);
    }

    public function details($id) {
        try {
            $company = $this->companyService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        return new CompanyResource($company);
    }

    public function store(CompanyStoreRequest $request) {
        $data = $request->validated(); // busca todos os dados da requisição
        $company = $this->companyService->store($data);
        return new CompanyResource($company);
    }

    public function update(int $id, CompanyUpdateRequest $request) {
        $data = $request->validated();
        try {
            $company = $this->companyService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        return new CompanyResource($company);
    }

    public function delete(int $id) {
        try {
            $company = $this->companyService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        return new CompanyResource($company);
    }

    public function getWithProducts() {
        $company = $this->companyService->getWithProducts();
        return CompanyResource::collection($company);
    }

    public function findProducts(int $id) {
        try {
            $products = $this->companyService->findProducts($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        return ProductResource::collection($products);
    }
}
