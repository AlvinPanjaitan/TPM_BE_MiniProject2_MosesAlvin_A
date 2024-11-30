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
        .image-container {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .museum-actions a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            margin-right: 10px;
            border-radius: 5px;
        }
        .museum-actions a:hover {
            background-color: #0056b3;
        }
        .museum-actions form {
            display: inline-block;
            margin: 0;
        }
        .museum-actions form button {
            padding: 5px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .museum-actions form button:hover {
            background-color: #c82333;
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
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($museums as $museum)
                <tr>
                    <td>{{ $museum->name }}</td>
                    <td>{{ $museum->description }}</td>
                    <td>{{ $museum->location }}</td>
                    <td>{{ $museum->category->name }}</td>
                    <td>
                        @if($museum->image)
                            <img src="{{ asset('storage/' . $museum->image) }}" alt="Museum Image" class="image-container">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td class="museum-actions">
                        <a href="{{ route('museums.edit', $museum->id) }}">Edit</a>

                        <!-- Form untuk Delete Museum -->
                        <form action="{{ route('museums.destroy', $museum->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus museum ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
