<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
</head>
<body>
    <form method="POST" action="/product/update">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="price">Price</label>
            <input id="price" type="number" name="price" value="{{ $product->price }}"   required>
        </div>
        <div>
            <label for="stock">Stock</label>
            <input id="stock" type="number" name="stock" value="{{ $product->stock }}" required>
        </div>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>