<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

Route::post('/dish', [DishController::class, 'generate']);
