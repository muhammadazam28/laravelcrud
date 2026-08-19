<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 7px 0 15px;
            box-sizing: border-box;
        }

        button {
            background: #198754;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a {
            margin-left: 10px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Tambah Data Siswa</h2>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <label>NIS</label>
        <input type="text" name="nis" value="{{ old('nis') }}">

        <label>Nama Siswa</label>
        <input type="text" name="nama" value="{{ old('nama') }}">

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin">
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label>Kelas</label>
        <input type="text" name="kelas" placeholder="Contoh: X">

        <label>Jurusan</label>
        <input type="text" name="jurusan" placeholder="Contoh: RPL">

        <label>Alamat</label>
        <textarea name="alamat"></textarea>

        <label>No HP</label>
        <input type="text" name="no_hp">

        <button type="submit">Simpan</button>

        <a href="{{ route('siswa.index') }}">
            Kembali
        </a>
    </form>

</div>

</body>
</html>
    