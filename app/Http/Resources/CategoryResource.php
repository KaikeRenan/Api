<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this->category->name);
        return [
            'ID da Categoria'=> $this->id,
            'Nome da Categoria' => $this->name,
            'Descrição da Categoria' => $this->description,
            'Produtos' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
