<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'ID do Produto' => $this->id ,
            'Nome do Produto' => $this->name,
            'Preço do Produto' => $this->price,
            'Descrição do Produto' => $this->description,
            'Categoria' => new CategoryResource($this->whenLoaded('category'))

            // 'Teste Preço do Produto' => $this->price - 15,


            // 'Desconto no Preço do Produto' => $this->price / 100 * 90
        ];

    }
}
