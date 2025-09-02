<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishController extends Controller
{
    public function __construct(private DishController $dishController) { }

    public function generate(DishRequest $request)
    {

    }
}
