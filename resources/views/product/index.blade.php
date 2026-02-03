@extends('layout.admin')
@section('content')
<table border="1 solid back" align="center" class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
            <td>{{$product['name']}}</td>
            <td>{{$product['price']}}</td>
            <td>{{$product['stock']}}</td>
            <td><a href="/product/edit/{{$product['id']}}">Edit</a></td>
            <td><a href="/product/delete/{{$product['id']}}">Delete</a></td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" align="center">
                <a href="/product/add">Add Product</a>
            </td>
    </table>
@endsection