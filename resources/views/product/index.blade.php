<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>{{$title}}</h1>
    <table border="1 solid back" align="center">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Price</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
            <td>{{$product['name']}}</td>
            <td>{{$product['price']}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" align="center">
                <a href="/product/add">Add Product</a>
            </td>
    </table>
</body>
</html>