<?php

namespace App\Clients;
use Illuminate\Support\Facades\Log;
use OpenAI;

class OpenAIClient
{
    private $client;

    public function __construct()
    {
        $this->client = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function checkDish(string $dish):bool
    {
        $prompt = "Check if \"$dish\" is a valid edible meal. Answer only 1 or 0";

        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
        ]);

        $content = $response->choices[0]->message->content;

        Log::info("CHECK RESPONSE - " . $content);

        if ($content == "0"){
            return false;
        }
        else{
            return true;
        }
    }


    public function generateRecipe(string $dish):array
    {
        $check = $this->checkDish($dish);

        Log::info("DISH - " . $check);

        if(!$check){
            return [
                'recipe' => ["Error: Invalid dish"],
                'ingredients' => [],
                'nutrition' => [],
            ];
        }

        $prompt = "Create a recipe for the dish \"$dish\".
                   Return the recipe as an array of objects with step by step recipe,
                   each object must have fields: \"number\" and \"step\".

                   Return the ingredients as an array of objects,
                   each object must have fields: \"name\" and \"quantity\".

                   The 'nutrition' field should contain calories, proteins, fats, and carbohydrates.

                   Return everything strictly in JSON format with keys: recipe, ingredients, nutrition.";

        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
        ]);

        $content = $response->choices[0]->message->content;

        Log::info("GENERATED - " . $content);

        if ($content === null) {
            return [
                'recipe' => ["Error: failed to parse AI response. Please try again."],
                'ingredients' => [],
                'nutrition' => [],
            ];
        }
        return json_decode($content, true);
    }
}

