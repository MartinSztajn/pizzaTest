<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Models\Pizza;
use App\Models\PizzaIngredients;
use App\Models\User;
use Illuminate\Http\Request;
Use Auth;
use Inertia\Inertia;

class IndexController extends Controller
{
    //

    public function createIngredient(Request $request){
        $ingredient =  new Ingredients();
        $ingredient->name = $request->name;
        $ingredient->cost = $request->cost;
        $ingredient->save();
        return back();
    }
    public function createPizza(Request $request){
        $cost = 0;

        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->cost = $cost;
        $pizza->save();


        foreach ($request->selectIngredients as $ing){
            $pizIng =  new PizzaIngredients();
            $pizIng->id_pizza = $pizza->id;
            $pizIng->id_ingredient = $ing;
            $pizIng->save();

            $ingredient = Ingredients::find($ing);
            $cost = $cost + $ingredient->cost;
        }
        $cost = $cost * 1.5;
        $pizza->cost = $cost;
        $pizza->save();

        return back();
    }
    public function updatePizza(Request $request){
        $pizza = Pizza::find($request->id);

        $ingredients = PizzaIngredients::where('id_pizza', $request->id)->delete();
        $cost = 0;
        foreach ($request->ingredients as $ing){
            $pizIng =  new PizzaIngredients();
            $pizIng->id_pizza = $pizza->id;
            $pizIng->id_ingredient = $ing;
            $pizIng->save();

            $ingredient = Ingredients::find($ing);
            $cost = $cost + $ingredient->cost;
        }
        $cost = $cost * 1.5;
        $pizza->cost = $cost;
        $pizza->save();

        return back();
    }


    public function deletePizza($id){
        $pizza = Pizza::find($id)->delete();
        $ingredients = PizzaIngredients::where('id_pizza', $id)->delete();

        return back();
    }
    public function editPost($id){
        $post = Publications::find($id);
        return Inertia::render('Dashboard', ['post' => $post]);

    }

}
