<?php

use App\Models\Pizza;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $ingredients =  \App\Models\Ingredients::select('ingredients.*')->get();

    $pizza =  Pizza::select('pizza.*')->get();

    foreach ($pizza as $piz){
        $ing = \App\Models\PizzaIngredients::where('pizza_ingredients.id_pizza', $piz->id)
            ->leftJoin('ingredients','ingredients.id','pizza_ingredients.id_ingredient')
            ->get()->pluck('id');
        $piz->ingredients = $ing;
    }

    return Inertia::render('Welcome', [
        'ingredients' => $ingredients,
        'pizzas' => $pizza
    ]);
});

Route::post('/createIngredient', [\App\Http\Controllers\IndexController::class, 'createIngredient']);
Route::post('/createPizza', [\App\Http\Controllers\IndexController::class, 'createPizza']);
Route::post('/updatePizza', [\App\Http\Controllers\IndexController::class, 'updatePizza']);
Route::post('/deletePizza/{id}', [\App\Http\Controllers\IndexController::class, 'deletePizza']);
