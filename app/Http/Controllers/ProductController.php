<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::where('is_delete', 0)->get();
        $title = "Product List";
        return view('product.index', [
            'title' => $title,
            'products' => $products
        ]);
    }

    public function getDetail(int $id = 123)
    {
        return view('product.detail', ['id' => $id]);
    }

    public function create()
    {
        return view('product.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $request->image,
            'is_active' => 1,
            'is_delete' => 0
        ]);

        return redirect('/product')->with('success', 'Thêm thành công');
        //return $request->all();
        //var_dump($request->all());
        //dd($request->all());
        // return redirect('/product');
    }
    
    public function edit($id)
    {
        $product = Product::where('is_delete', 0)->findOrFail($id);
        $categories = Category::all();

        //compact biến value thành key, kiểu như compact('product', 'categories') = ['product' = $product]
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $product = Product::findOrFail($request->id);

        $product->update($request->all());

        return redirect('/product')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $product = Product::FindOrFail($id);
        $product->update([
            'is_delete' => 1
        ]);

        return redirect('/product');
    }
}