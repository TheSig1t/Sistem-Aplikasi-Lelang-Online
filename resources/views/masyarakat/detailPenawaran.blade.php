<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | User</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ url('logout') }}" class="navbar-brand">
        <img src="/dist/img/user.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Session::get('nama_lengkap') }}</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ url('masyarakat/home') }}" class="nav-link active">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Lelang</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">History Lelang</a></li>
              <li><a href="#" class="dropdown-item">Pemenang Lelang</a></li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
              <div class="row mb-2">
                <div class="col-sm-6">
                  @foreach ($barangDetail as $row)
                  <h1>Detail dari barang : <small style="color:lightcoral;">{{ $row->barang->nama_barang }}</small></h1>
                  @endforeach
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('masyarakat/homeLelang') }}">< Kembali</a></li>
                    </ol>
                </div>
              </div>
            </div>
            <section class="content">
                @foreach ($barangDetail as $row)
                <div class="card card-solid">
                    <div class="card-body">
                      <div class="row">
                          <div class="col-12 col-sm-6">
                          <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                          <div class="col-12">
                              <img src="{{ asset('storage/'. $row->barang->foto_barang) }}" class="product-image" alt="Product Image" style="border-radius: 10px; max-width:570px; max-height:470px;">
                            </div>
                            <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img src="{{ asset('storage/'. $row->barang->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                            <div class="product-image-thumb" ><img src="{{ asset('storage/'. $row->barang->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                            <div class="product-image-thumb" ><img src="{{ asset('storage/'. $row->barang->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                            <div class="product-image-thumb" ><img src="{{ asset('storage/'. $row->barang->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                            <div class="product-image-thumb" ><img src="{{ asset('storage/'. $row->barang->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                        </div>
                    </div>
                        <div class="col-12 col-sm-6">
                            <div class="mt-4">
                                <div class="btn btn-primary btn-lg btn-flat" style="cursor:default; border-radius:5px; ">
                                    <h4 class="my-3">{{ $row->barang->nama_barang }}</h4>
                            </div>
                          <hr>
                          <h5 class="mt-3">Tanggal ditambahkan*</h5>
                          <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-default text-center">
                                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                  {{ $row->barang->tgl }}
                                </label>
                            </div>
                          <div class="bg-gray py-2 px-3 mt-4">
                              <h4 class="mt-0">
                                <small style="color: lightcoral;"> Open BID*</small>
                            </h4>
                            <h2 class="mb-0">
                                RP.{{ $row->barang->harga_awal }}
                            </h2>
                          </div>
                          <br />
                          <h5 class="mt-3">Masukan nilai BID anda*</h5>
                          <form action="{{ url('masyarakat/postPenawaran/'.$row->id_lelang) }}" method="post">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">IDR</span>
                            </div>
                                @csrf
                                <input type="text" name="penawaran_harga" class="form-control" autofocus> 
                                <!-- ini buat ngambil id barang tapi disembunyiin -->
                                <input type="hidden" name="id_barang" value="{{$row->id_barang}}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                                <button type="submit" class="btn btn-info btn-md">BID</button>
                            </div>
                        </form>
                          <div class="row mt-4">
                              <nav class="w-100">
                          <div class="nav nav-tabs" id="product-tab" role="tablist">
                              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Deskripsi*</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{ $row->barang->deskripsi_barang }}</div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
        </div>
            @endforeach
        </section><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <h4 style="color: rgba(13, 45, 62,0.8);">Barang yang sedang di lelang:</h4>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 200px">Foto barang</th>
                    <th>Nama barang</th>
                    <th style="width: 230px">Tanggal mulai lelang</th>
                    <th style="width: 155px; color:red;">BID sementara</th>
                    <th style="width: 130px">Detail barang</th>
                  </tr>
                </thead>
                <?php $i=1; ?>
                @foreach($barang as $row)
                <tbody>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><img src="{{ asset('storage/'. $row->barang->foto_barang) }}" height="150px" width="150px" style="border-radius:50%;"></td>
                  <td>{{$row->barang->nama_barang}}</td>
                  <td>{{$row->barang->tgl}}</td>
                  <td>{{$row->barang->harga_awal}}</td>
                  <td>
                    <a href="{{url('masyarakat/detailPenawaran/'.$row->id_lelang)}}" ><button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</button></a>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" style="position: fixed    ; bottom:0;">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="/dist/js/demo.js"></script> --}}
</body>
</html>
