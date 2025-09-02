<?php

namespace App\Clients;
use OpenAI;

class OpenAIClient
{
    private $client;

    public function __construct()
    {
        $this->client = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function generateRecipe(string $dish):array
    {
        $promt = "Create a recipe for the dish \"$dish\".
                   The 'recipe' field must contain step-by-step cooking instructions.
                   The 'ingredients' field should be an array with quantities.
                   The 'nutrition' field should contain calories, proteins, fats, and carbohydrates.
                   Return everything strictly in JSON format with keys: recipe, ingredients, nutrition.";

        $responce = $this->client->chat()->create([
           'model'=>'gpt-4o-mini',
            'message'=>[
                'role'=>'user',
                'content'=>$promt,
            ],
        ]);

        $content = $responce->choices[0]->message->content;

        return json_decode($content, true);
    }
}

