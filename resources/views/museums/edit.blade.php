<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Museum</title>
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
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }
        .form-container input, .form-container textarea, .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #218838;
        }
        .image-preview {
            margin-top: 10px;
            max-width: 200px;
        }
        nav {
            background-color: #343a40;
            color: white;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        nav ul {
            list-style-type: none;
            display: inline;
            margin-left: 20px;
        }
        nav ul li {
            display: inline;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Museum Virtual</a>
        <ul>
            <li><a href="{{ route('museums.index') }}">Daftar Museum</a></li>
        </ul>
    </nav>

    <div class="form-container">
        <h1>Edit Museum</h1>

        <form action="{{ route('museums.update', $museum->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Nama Museum</label>
                <input type="text" name="name" id="name" value="{{ $museum->name }}" required>
            </div>

            <div>
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" rows="3" required>{{ $museum->description }}</textarea>
            </div>

            <div>
                <label for="location">Lokasi</label>
                <input type="text" name="location" id="location" value="{{ $museum->location }}" required>
            </div>

            <div>
                <label for="category_id">Kategori</label>
                <select name="category_id" id="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $museum->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="image">Gambar</label>
                <input type="file" name="image" id="image">
                @if($museum->image)
                    <div class="image-preview">
                        <img src="{{ asset('storage/' . $museum->image) }}" alt="Museum Image" style="width: 100%; max-width: 200px;">
                    </div>
                @endif
            </div>

            <button type="submit">Update Museum</button>
        </form>
    </div>
</body>
</html>
