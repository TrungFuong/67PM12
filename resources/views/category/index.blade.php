@extends('layout.admin')
@section('content')
    <h1>Category List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Parent ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td><img src="{{ $category->image }}" alt="{{ $category->name }}" width="50"></td>
                <td>{{ $category->parent_id }}</td>
                <td><a href="/category/edit/{{$category->id}}">Edit</a></td>
                <td><a href="/category/delete/{{$category->id}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection