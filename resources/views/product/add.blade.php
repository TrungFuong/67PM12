<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
</head>
<body>
    <form method="POST" action="/product/store">
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" required>
        </div>
        <div>
            <label for="price">Price</label>
            <input id="price" type="number" name="price" required>
        </div>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>