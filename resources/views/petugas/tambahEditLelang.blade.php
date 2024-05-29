<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lelang</title>
    <link rel="stylesheet" href="/css/register.css">
</head>
<body>
    <nav>
        <a href="{{ url('petugas/homeLelang') }}"><h1>Home lelang</h1></a>
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
        <h2>Tambah barang lelang</h2>
        <form action="{{ url('petugas/postLelang',@$lelang->id_lelang) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(!empty($lelang))
            @method('PATCH')
            
            @endif
            <label>Barang</label>
            <div class="form-control" style="margin-top: 10px">
                <select class="" name="id_barang" id="id_barang"><br>
                    <option disabled selected>-- Pilih barang --</option>
              @foreach($barang as $row)
                            <option value="{{$row->id_barang}}"
                                    
                                {{old('id_barang')}}
                                
                                    @if(@$lelang->id_barang == $row->id_barang)
                                        selected
                                    @endif>

                                {{$row->nama_barang}}
                            </option>
                    @endforeach
            </select>
          </div>
          <button type="submit">Tambah</button>
        </form>
        <p>Batal menambahkan barang baru?<a href="{{ url('petugas/homeLelang') }}">Kembali</a></p>
      </div>
</body>
</html>