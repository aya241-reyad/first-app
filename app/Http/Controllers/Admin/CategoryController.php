<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents=Category::whereNull('parent_id')->get();
        return view("categories.create", compact("parents"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
    
    $category = Category::create([
        'name' => $request->name,
        'description' =>  $request->description,
        'image' =>  $request->image,
        'parent_id' =>  $request->parent_id,
    ]);
    
        return redirect('/categories');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $category = Category::findOrFail($id);
     return view("categories.show", compact("category"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $parents=Category::whereNull('parent_id')->get();
        $category = Category::findOrFail($id);
        return view("categories.edit", compact("category","parents"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            "name"=> $request->name,
            "description"=> $request->description,
            "image"=> $request->image,
            "parent_id"=> $request->parent_id
        ]);

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories');
    }
}
