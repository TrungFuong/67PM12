<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
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
        $product = new Product;
        $name = $request->input('name');
        $price = $request->input('price');
        $stock = $request->input('stock');

        $product->name = $name;
        $product->price = $price;
        $product->stock = $stock;

        $product->save();

        return redirect('/product');
        //return $request->all();
        //var_dump($request->all());
        //dd($request->all());
        // return redirect('/product');
    }
    
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);
        if (!$product) {
            return redirect('/product')->with('error', '0 có sp');
        }
        if ($request->has('name')) {
            $product->name = $request->input('name');
        } else {
            $product->name = $product->name;
        }
        if ($request->has('price')) {
            $product->price = $request->input('price');
        } else {
            $product->price = $product->price;
        }
        if ($request->has('stock')) {
            $product->stock = $request->input('stock');
        } else {
            $product->stock = $product->stock;
        }
        
        $product->save();

        return redirect('/product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }
        return redirect('/product');
    }
}