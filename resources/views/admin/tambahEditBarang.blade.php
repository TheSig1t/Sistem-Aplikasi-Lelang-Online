{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang | Admin</title>
    <!-- CSS here -->
    <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>ADMIN Tambah Barang</h1>
            <hr>
            <!-- ini buat cek doang -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- ini buat register -->
            <!-- yg penting mah di tag input name sama id harus sama di controller atau field di tabel / DB  -->
            <form action="{{ url('/admin/postTambahEdit',@$barang->id_barang) }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- nah ini buat pengecekan kalo $barang ada datanya maka ngejalanin method patch -->
                @if(!empty($barang))
                    @method('PATCH')
                @endif
                <div class="form-group">
                    <label for="nama_barang">Nama Barang:</label>
                    <!-- ini contoh old  -->
                    <input type="text"  class="form-control" id="nama_barang" name="nama_barang" value="{{old('nama_barang',@$barang->nama_barang)}}">
                </div>            
                <div class="form-group">
                    <label for="harga_awal">Harga Awal:</label>
                    <input type="text"  class="form-control" id="harga_awal" name="harga_awal" value="{{old('harga_awal',@$barang->harga_awal)}}">
                </div>                
                <div class="form-group">
                    <label for="deskripsi_barang">Deskripsi:</label>
                    <input type="text" class="form-control" id="deskripsi_barang" name="deskripsi_barang" value="{{old('deskripsi_barang',@$barang->deskripsi_barang)}}">
                </div>
                <div class="form-group">
                    <label for="deskripsi_barang">Foto Barang:</label>
                    <input type="file" class="form-control" id="foto_barang" name="foto_barang" value="{{old('foto_barang',@$barang->foto_barang)}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
            <a href="{{ url('admin/home') }}"><button class="btn btn-md btn-danger">Kembali</button></a>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->

    <!-- JS here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="./assets/js/jquery.counterup.min.js"></script>
    
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang | Admin</title>
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
        <a href="{{ url('admin/home') }}"><h1>&LeftTeeArrow; Kembali</h1></a>
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
        <form action="{{ url('admin/postTambahEdit',@$barang->id_barang) }}" method="post" enctype="multipart/form-data">
          @csrf
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
        <p style="font-size: 0.9rem;">Batal melakukan penambahan atau pengeditan barang? <a href="{{ url('admin/home') }}">Kembali</a></p>
      </div>
</body>
</html>