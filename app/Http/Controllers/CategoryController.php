<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('category.create',['restaurants' => $restaurants]);
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
            'type'                     => 'required|min:4|max:255',
            'restaurant_id'            => 'required|numeric|exists:restaurants,id',
            'image'                    => 'required|file|image'
        ]);
        $category = new Category();
        $category->type = $request->type;
        $category->restaurant_id = $request->restaurant_id;
        $category->image = $request->image;
        $image = $request->image;
        $path = $image->store('category-images', 'public');
        $category->image = $path;
        $category->slug = Str::slug($request->type, '-');
        $category->save();
        return redirect()->route('categories.show', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $restaurants = Restaurant::all();
        return view('category.edit',['category' => $category,'restaurants' => $restaurants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'type'                     => 'required|min:4|max:255',
            'restaurant_id'            => 'required|numeric|exists:restaurants,id',
            'image'                    => 'required|file|image'
        ]);

        $category->type = $request->type;
        $category->restaurant_id = $request->restaurant_id;
        $category->image = $request->image;
        $image = $request->image;
        $path = $image->store('category-images', 'public');
        $category->image = $path;
        $category->slug = Str::slug($request->type, '-');
        $category->save();
        return redirect()->route('categories.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
