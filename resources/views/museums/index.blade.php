

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Museum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Daftar Museum</h1>

    <p><a href="{{ route('museums.create') }}">Tambah Museum Baru</a></p>

    <table>
        <thead>
            <tr>
                <th>Nama Museum</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach($museums as $museum)
                <tr>
                    <td>{{ $museum->name }}</td>
                    <td>{{ $museum->description }}</td>
                    <td>{{ $museum->location }}</td>
                    <td>{{ $museum->category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
