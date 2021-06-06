<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::all();
        return view('meal.index', ['meals' => $meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $components = Component::all();
        return view('meal.create',['categories'=> $categories,'components'=>$components]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                     => 'required|min:4|max:255',
            'price'                     => 'required|numeric',
            'calory'                     => 'required|numeric',
            'category_id'            => 'required|numeric|exists:categories,id',
            'components'                      => 'array',
            // 'image'    => 'file|image',
        ]);
        $meal = new Meal();
        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->calory = $request->calory;
        $meal->image = $request->image;
        $meal->category_id = $request->category_id;
        $meal->slug = Str::slug($request->name, '-');
        $meal->save();
        $meal->components()->sync($request->components);
        return redirect()->route('meals.show', $meal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        return view('meal.show',['meal' => $meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {

        $categories = Category::all();
        $components = Component::all();
        return view('meal.edit',['meal' => $meal,'categories'=> $categories,'components'=>$components]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'name'                     => 'required|min:4|max:255',
            'price'                     => 'required|numeric',
            'calory'                     => 'required|numeric',
            'category_id'            => 'required|numeric|exists:categories,id',
            'components'                      => 'array',
            // 'image'    => 'file|image',
        ]);

        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->calory = $request->calory;
        $meal->image = $request->image;
        $meal->category_id = $request->category_id;
        $meal->slug = Str::slug($request->name, '-');
        $meal->save();
        $meal->components()->sync($request->components);
        return redirect()->route('meals.show', $meal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}






