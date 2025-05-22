<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID da empresa' => $this->id,
            'Razão Social' => $this->social_reason,
            'Nome Fantasia' => $this->fantasy_name,
            'CNPJ da empresa' => $this->cnpj,
            'Produtos' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
