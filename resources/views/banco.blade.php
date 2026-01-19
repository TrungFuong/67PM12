<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bàn cờ</title>
    <style>
        td{
            width: 50px;
            height: 50px;
        }
        .black{
            background-color: black;
        }
        .white{
            background-color: white;
        }
    </style>
</head>
<body>
    <table border="1" align="center">
        @for ($i = 0; $i < $n; $i++)
            <tr>
                @for ($j = 0; $j < $n; $j++)
                    <td class="{{ ($i + $j) % 2 == 0 ? 'white' : 'black' }}"></td>
                @endfor
            </tr>
        @endfor
    </table>
</body>
</html>