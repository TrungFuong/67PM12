<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>18+?????</title>
</head>
<body>
    <form method="POST" action="/save-age">
        @csrf
        
        <div>
            <label for="age">Nhập tuổi</label>
            <input id="age" type="text" name="age" required>
        </div>
        <button type="submit">Validate</button>
    </form>
</body>
</html>