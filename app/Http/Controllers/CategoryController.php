<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showAddCategoryForm()
    {
        return view('category.add');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('is_deleted', false)->get();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->image = $request->input('image');
        $categoy->parent_id = $request->input('parent_id');
        $category->save();
        return redirect('/category')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $categories = Category::where('is_deleted', false)->get();
        return view('category.show', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        if($category->name != $request->input('name')) {    
            $category->name = $request->input('name');
        }
        if($category->description != $request->input('description')) {    
            $category->description = $request->input('description');
        }
        if($category->image != $request->input('image')) {    
            $category->image = $request->input('image');
        }
        if($category->parent_id != $request->input('parent_id')) {    
            $category->parent_id = $request->input('parent_id');
        }
        $category->save();
        return redirect('/category')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->is_deleted = true;
        $category->save();
        return redirect('/category')->with('success', 'Category deleted successfully!');
    }
}
