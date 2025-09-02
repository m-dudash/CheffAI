<?php

namespace App\Services;

use App\DTOs\DishDTO;

class DishService
{
    public function generateDish(string $dish) : DishDTO
    {
        return new DishDTO(
            recipe: "Рецепт приготовления {$dish}. Пожарить в сковородке",
            ingredients: [
                'Курица - 1 кг',
                'Соль - по вкусу',
                'Перец - по вкусу'
            ],
            nutrition: [
                'calories' => 250,
                'proteins' => 30,
                'fats' => 15,
                'carbs' => 5
            ]);
    }
}
