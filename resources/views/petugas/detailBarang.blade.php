<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Barang | Petugas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('petugas/home') }}" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('logout') }}" class="brand-link elevation-4">
        <img src="/dist/img/out.svg" alt="AdminLTE Logo" class="brand-image img-circle " style="opacity: .8; margin-top:1px; margin-right: 10px;" height="30px">
        <span class="brand-text font-weight-light">Log out</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user.svg" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('petugas/home') }}" class="d-block">{{ Session::get('nama_petugas') }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="{{ url('petugas/home') }}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                Data Barang
                </p>
            </a>
            </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Detail Barang
                  </p>
                </a>
              </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @foreach ($barangDetail as $row)
            <h1>Detail dari barang : {{ $row->nama_barang }}</h1>
            @endforeach
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Home</a></li>
              </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @foreach ($barangDetail as $row)
        <div class="card card-solid">
            <div class="card-body">
              <div class="row">
                  <div class="col-12 col-sm-6">
                  <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                  <div class="col-12">
                      <img src="{{ asset('storage/'. $row->foto_barang) }}" class="product-image" alt="Product Image" style="border-radius: 10px; max-width:570px; max-height:470px;">
                    </div>
                    <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="{{ asset('storage/'. $row->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ asset('storage/'. $row->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ asset('storage/'. $row->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ asset('storage/'. $row->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ asset('storage/'. $row->foto_barang) }}" style="border-radius: 50%" width="110px" height="110px" alt="Product Image"></div>
                </div>
            </div>
                <div class="col-12 col-sm-6">
                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat" style="cursor:default; border-radius:5px; ">
                            <h4 class="my-3">{{ $row->nama_barang }}</h4>
                    </div>
                  <hr>
                  <h5 class="mt-3">Tanggal ditambahkan*</h5>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-default text-center">
                          <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                          {{ $row->tgl }}
                        </label>
                    </div>
                    <br /> <br /> <br /> <br />

                  <div class="bg-gray py-2 px-3 mt-4">
                      <h4 class="mt-0">
                        <small>Harga awal*</small>
                      </h4>
                    <h2 class="mb-0">
                        RP.{{ $row->harga_awal }}
                    </h2>
                  </div>

                  <div class="row mt-4">
                      <nav class="w-100">
                  <div class="nav nav-tabs" id="product-tab" role="tablist">
                      <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Deskripsi*</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{ $row->deskripsi_barang }}</div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        </div>
    </div>
</div>
    @endforeach
</section>
<!-- /.content -->
</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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