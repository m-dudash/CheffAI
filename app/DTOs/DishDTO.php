<?php

namespace App\DTOs;

Class DishDTO{
    public function __construct(
        public array $recipe,
        public array $ingredients,
        public array $nutrition
    )
    { }

    public function toArray(): array
    {
        return [
            'recipe'=>$this->recipe,
            'ingredients'=>$this->ingredients,
            'nutrition'=>$this->nutrition,
        ];
    }
}
