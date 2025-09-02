<?php

namespace App\Services;

use App\DTOs\DishDTO;
use App\Clients\OpenAIClient;

class DishService
{
    public function __construct(private OpenAIClient $client)
    {}

    public function generateDish(string $dish) : DishDTO
    {
        $data = $this->client->generateRecipe($dish);

        return new DishDTO(
            recipe: $data['recipe'] ?? "",
            ingredients: $data['ingredients'] ?? [],
            nutrition: $data['nutrition'] ?? []
        );
    }
}
