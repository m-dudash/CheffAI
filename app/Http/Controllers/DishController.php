<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Services\DishService;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function __construct(private DishService $dishService) { } //dependency injection

    public function generate(DishRequest $request)
    {
        $dto = $this->dishService->generateDish($request->dish);
        return response()->json($dto->toArray());
    }
}
