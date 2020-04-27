<?php

namespace App\Http\Controllers;

use App\Recipe;
use Auth;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        return view('recipe.index', ['recipes' => Recipe::where('created_by', $userId)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $newRecipe = Recipe::create([
            'title' => $request->recipe['title'],
            'prep' => $request->recipe['prep'],
            'cook' => $request->recipe['cook'],
            'ingredients' => json_encode($request->recipe['ingredients']),
            'instructions' => json_encode($request->recipe['instructions']),
            'regimen' => $request->recipe['regimen'],
            'desc' => $request->recipe['desc'],
            'created_by' => $userId
        ]);
        $newRecipe->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        $recipe->ingredients = json_decode($recipe->ingredients);
        $recipe->instructions = json_decode($recipe->instructions);
        // dd($recipe);
        return view('recipe.show', ['recipe' => $recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $recipe->ingredients = json_decode($recipe->ingredients);
        $recipe->instructions = json_decode($recipe->instructions);
        return view('recipe.edit', ['recipe' => $recipe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $MainRecipe = Recipe::find($recipe->id);
        
        $MainRecipe->title = $request->recipe['title'];
        $MainRecipe->prep = $request->recipe['prep'];
        $MainRecipe->cook = $request->recipe['cook'];
        $MainRecipe->ingredients = $request->recipe['ingredients'];
        $MainRecipe->instructions = $request->recipe['instructions'];
        $MainRecipe->regimen = $request->recipe['regimen'];
        $MainRecipe->desc = $request->recipe['desc'];
        $MainRecipe->created_by = $request->recipe['created_by'];

        $MainRecipe->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $CurrentRecipe = Recipe::find($recipe->id);
        $CurrentRecipe->delete();
    }
}
