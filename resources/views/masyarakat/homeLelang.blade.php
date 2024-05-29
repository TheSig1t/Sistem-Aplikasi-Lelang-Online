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
  <!-- Toastr -->
  <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/card_lelang.css">
  
  <script src="/js/card.js"></script>
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
            <a href="{{ url('masyarakat/home') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Lelang</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ url('masyarakat/homeLelang') }}" class="dropdown-item">Lelang</a></li>
              <li><a href="{{ url('masyarakat/formHistoryLelang') }}" class="dropdown-item">History Lelang</a></li>
              <li><a href="{{ url('masyarakat/formPemenang') }}" class="dropdown-item">Pemenang Lelang</a></li>
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
            <h1 class="m-0"><small style="color: #eb566c;">sistem lelangKU</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('masyarakat/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('logout') }}">Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="container-card">
            <h2 class="title">Available</h2>
            @foreach ($barang as $row)
            <div class="product_container">
              <div class="product" data-id-lelang="{{ $row->id_lelang }}">
                <img src="{{ asset('storage/'. $row->barang->foto_barang) }}" alt="#">
                <h3>{{ $row->barang->nama_barang }}</h3>
                {{-- <div class="price">
                  Rs 35,000 <span>(6% off)</span>
                </div> --}}
                <div class="button">
                  <a href="{{ url('masyarakat/get-lelang-details/'.$row->id_lelang) }}" class="view-details">View Details</a>
                </div>
              </div>
            </div>
            @endforeach

            {{-- MODAL --}}
            <div class="product-details" style="display: none;">
              <div class="preview">
                 <i class="fa fa-times" aria-hidden="false"></i>
                 <div class="block">
                    <div class="image-block">
                       <img src="./asserts/dslr.png" alt="#">
                    </div>
                    <div class="content-block">
                       <h3>Camera</h3>
                       <div class="stars">
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star-half-alt" aria-hidden="true"></i>
                          <span>(4000)</span>
                       </div>
                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                       <div class="price">
                          Rs 35,000 <span>(6% off)</span>
                       </div>
                       <div class="buttons">
                          <a href="#" class="buy">Buy Now</a>
                          <a href="#" class="cart">Add to Cart</a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           
      
         </div>
            {{-- <h4 style="color: rgba(13, 45, 62,0.8);">Barang yang sedang di lelang:</h4>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 200px">Foto barang</th>
                    <th>Nama barang</th>
                    <th style="width: 230px">Tanggal mulai lelang</th>
                    <th style="width: 155px; color:red;">BID sementara</th>
                    <th style="width: 130px">BID Lelang</th>
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
                    <a href="{{url('masyarakat/detailPenawaran/'.$row->id_lelang)}}" ><button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> BID</button></a>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div> --}}
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
{{-- Modal-Card --}}
<script src="/js/card.js"></script>
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
  // Menampilkan pesan gagal
  @if(Session::has('alert-warning'))
    toastr.warning("{{ Session::get('alert-warning') }}");  
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