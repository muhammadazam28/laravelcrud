<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>

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
            background: #0d6efd;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Edit Data Siswa</h2>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>NIS</label>
        <input type="text" name="nis" value="{{ $siswa->nis }}">

        <label>Nama Siswa</label>
        <input type="text" name="nama" value="{{ $siswa->nama }}">

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin">
            <option value="Laki-laki"
                {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                Laki-laki
            </option>

            <option value="Perempuan"
                {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                Perempuan
            </option>
        </select>

        <label>Kelas</label>
        <input type="text" name="kelas" value="{{ $siswa->kelas }}">

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="{{ $siswa->jurusan }}">

        <label>Alamat</label>
        <textarea name="alamat">{{ $siswa->alamat }}</textarea>

        <label>No HP</label>
        <input type="text" name="no_hp" value="{{ $siswa->no_hp }}">

        <button type="submit">Update</button>

        <a href="{{ route('siswa.index') }}">
            Kembali
        </a>
    </form>

</div>

</body>
</html>
