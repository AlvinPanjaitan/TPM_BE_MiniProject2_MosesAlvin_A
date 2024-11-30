<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Museum Baru</title>
</head>
<body>
    <nav style="background-color: #343a40; color: white; padding: 10px;">
        <a href="{{ url('/') }}" style="color: white; text-decoration: none; font-size: 18px;">Museum Virtual</a>
        <ul style="list-style-type: none; display: inline; margin-left: 20px;">
            <li style="display: inline; margin-right: 15px;">
                <a href="{{ route('museums.index') }}" style="color: white; text-decoration: none;">Daftar Museum</a>
            </li>
        </ul>
    </nav>

    <div style="max-width: 600px; margin: 40px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h1>Tambah Museum Baru</h1>

        <form action="{{ route('museums.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block;">Nama Museum</label>
                <input type="text" name="name" id="name" style="width: 100%; padding: 10px;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="description" style="display: block;">Deskripsi</label>
                <textarea name="description" id="description" rows="3" style="width: 100%; padding: 10px;" required></textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="location" style="display: block;">Lokasi</label>
                <input type="text" name="location" id="location" style="width: 100%; padding: 10px;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="category_id" style="display: block;">Kategori</label>
                <select name="category_id" id="category_id" style="width: 100%; padding: 10px;" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="image" style="display: block;">Gambar Museum</label>
                <input type="file" name="image" id="image" style="width: 100%; padding: 10px;">
            </div>

            <button type="submit" style="padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px;">Simpan Museum</button>
        </form>
    </div>
</body>
</html>
