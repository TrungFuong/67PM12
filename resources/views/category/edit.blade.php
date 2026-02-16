<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
</head>
<body>
            <form method="POST" action="/category/update/{{ $category->id }}">
        @csrf
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $category->name }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="{{ $category->description }}" required>
        </div>
        <div>
            <label for="image">Image</label>
            <input id="image" type="text" name="image" value="{{ $category->image }}" required>
        </div>
        <div>
            <label for="parent_id">Parent ID</label>
            <input id="parent_id" type="number" name="parent_id" value="{{ $category->parent_id }}" required>
        </div>
        <button type="submit">Update Category</button>
    </form>
</body>
</html>