<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Steps;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::paginate();//Sense posar res entre parentesis pagina de 20 en 20
        $categories = Category::all();
        return view('welcome',compact('recipes','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('createRecipe',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {

        Storage::disk('local')->put('public/'.time().'file.png',$request->input('foto'));

        $request->file('foto')->storeAs('public/', time().'file.png');

        $recepta = Recipe::create([
            'user_id'=> $request->input('user_id'),
            'category_id'=> $request->input('categoria'),
            'name'=> $request->input('nomRecepta'),
            'image' => 'storage/'.time().'file.png',
            'description'=> $request->input('descripcio'),
            'prep_time'=> $request->input('prepTime'),
        ]);

        foreach ($request->input('ingredients') as $ingredient){

            Ingredient::create([
                'recipe_id' => $recepta->id,
                'ingredient' => $ingredient,
            ]);

        };

        foreach ($request->input('pasos') as $pas){

            Steps::create([
                'recipe_id' => $recepta->id,
                'step' => $pas,
            ]);

        };

        return redirect()->action([RecipeController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $recipe = Recipe::find($id);
        return view('showRecipe',compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeRequest  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
