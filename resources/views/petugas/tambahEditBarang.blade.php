<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang | Petugas</title>
    <link rel="stylesheet" href="/css/register.css">
    <style>
        /* Styling untuk pesan error */
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        </style>
</head>
<body>
    <nav>
        <a href="{{ url('petugas/home') }}"><h1>&LeftArrow; Kembali</h1></a>
      </nav>
      <div class="form-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <h2>Data Barang</h2>
        <form action="{{ url('petugas/postTambahEdit',@$barang->id_barang) }}" method="post" enctype="multipart/form-data">
          @csrf
            <!-- nah ini buat pengecekan kalo $barang ada datanya maka ngejalanin method patch -->
            @if(!empty($barang))
                @method('PATCH')
            @endif
          <div class="form-control">
            <input type="text" required name="nama_barang" id="nama_barang" value="{{old('nama_barang',@$barang->nama_barang)}}" autofocus>
            <label>Nama barang</label>
          </div>
          <div class="form-control">
            <input type="number" required name="harga_awal" id="harga_awal" value="{{old('harga_awal',@$barang->harga_awal)}}">
            <label>Harga awal</label>
          </div>
          <div class="form-control">
            <input type="text" required name="deskripsi_barang" id="deskripsi_barang" value="{{old('deskripsi_barang',@$barang->deskripsi_barang)}}">
            <label>Deskripsi</label>
          </div>
          <label>Upload foto barang</label>
          <div class="form-control">
            <input class="foto" type="file" required name="foto_barang" id="foto_barang" value="{{old('foto_barang',@$barang->foto_barang)}}" style="">
          </div>
          <button type="submit">Tambah</button>
        </form>
        <p style="font-size: 0.9rem;">Batal melakukan penambahan atau pengeditan barang? <a href="{{ url('petugas/home') }}">Kembali</a></p>
      </div>
</body>
</html>