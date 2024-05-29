<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
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
        <a href="{{ url('admin/home') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
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
          <a href="#" class="d-block">{{ Session::get('nama_petugas') }}</a>
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
               <li class="nav-item menu-open">
                <a href="{{ url('admin/home') }}" class="nav-link active">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Data Barang
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('formRegisAdmin') }}" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Tambah data petugas
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/formTambahBarang') }}" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Tambah data barang
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Lelang</p>
                </a>
              </li> --}}
          <li class="nav-item">
            <a href="{{ url('admin/formPemenang') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                History Lelang
              </p>
            </a>
          </li>
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
            <h1>ADMIN PAGE</h1>
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
      <div class="container-fluid" style="margin-top: 30px">
        <h4 style="color: red;">DATA BARANG :</h4>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 200px">Foto barang</th>
                    <th>Nama barang</th>
                    <th style="width: 230px">Tanggal penambahan barang</th>
                    <th style="width: 105px">Harga awal</th>
                    <th style="width: 230px">Aksi</th>
                  </tr>
                </thead>
                <?php $i=1; ?>
                @foreach($barang as $row)
                <tbody>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><img src="{{ asset('storage/'. $row->foto_barang) }}" height="150px" width="150px" style="border-radius:50%;"></td>
                  <td>{{$row->nama_barang}}</td>
                  <td>{{$row->tgl}}</td>
                  <td>{{$row->harga_awal}}</td>
                  <td>
                    <a href="{{ url('admin/formDetailBarang/'.$row->id_barang) }}" ><button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>detail</button></a>
                    <a href="{{ url('admin/formEditBarang/'.$row->id_barang) }}" ><button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i>Edit</button></a>
                    <a href="{{ url('admin/postDelete/'.$row->id_barang) }}" onclick="return confirm('Apakah anda yakin ingin menghapus barang {{ $row->nama_barang }}')"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</button></a>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
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
<!-- Toastr -->
<script src="/plugins/toastr/toastr.min.js"></script>
<script>
  // Menampilkan pesan sukses
  @if(Session::has('alert-success'))
    toastr.success("{{ Session::get('alert-success') }}");  
  @endif
  // Menampilkan pesan sukses login
  @if(Session::has('alert-info'))
    toastr.info("{{ Session::get('alert-info') }}");  
  @endif
  
  // Menampilkan pesan error
  @if(Session::has('alert-error'))
    toastr.error("{{ Session::get('alert-error') }}");  
  @endif
</script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="/dist/js/demo.js"></script> --}}
</body>
</html>
