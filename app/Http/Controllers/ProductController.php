<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $title = "Product List";
        return view('product.index', [
            'title' => $title,
            'products' => [
                ['id'=>1, 'name'=>'Samsung Galaxy S21', 'price'=>10000000],
                ['id'=>2, 'name'=>'BPhone 67', 'price'=>67000000],
                ['id'=>3, 'name'=>'Tommy Xiaomi', 'price'=>6900000],
            ]
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
        $name = $request->input('name');
        $price = $request->input('price');
        //return $request->all();
        //var_dump($request->all());
        dd($request->all());
        // return redirect('/product');
    }       
}