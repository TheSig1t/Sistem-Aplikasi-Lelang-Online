@extends('login.layouts.register')
@section('registerMasyarakat')
<link rel="stylesheet" href="css/register.css">

<nav>
    <!-- <a href="#"><img src="https://tinyurl.com/bd6ba3jb" alt="logo"></a> -->
    <a href="{{ url('/') }}"><h1>Sistem lelangKU</h1></a>
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
    <h2>Daftar akun</h2>
    <form action="{{ url('postRegisMasyarakat') }}" method="post">
      @csrf
      <div class="form-control">
        <input type="text" required name="nama_lengkap" id="nama_lengkap" autofocus>
        <label>Nama</label>
      </div>
      <div class="form-control">
        <input type="number" required name="no_telp" id="no_telp">
        <label>Nomor Telpon</label>
      </div>
      <div class="form-control">
        <input type="text" required name="username" id="username">
        <label>Username</label>
      </div>
      <div class="form-control">
        <input type="password" required name="pass" id="pass">
        <label>Password</label>
      </div>
      <div class="form-control">
        <input type="password" required name="cpass" id="cpass">
        <label> Confirm Password</label>
      </div>
      <button type="submit">Daftar</button>
      <!-- <div class="form-help">
        <div class="remember-me">
          <input type="checkbox" id="remember-me">
          <label for="remember-me">Remember me</label>
        </div>
        <a href="#">Need help?</a>
      </div> -->
    </form>
    <p>Sudah punya akun? <a href="{{ url('formLoginMasyarakat') }}">Login sekarang</a></p>
    <small>
      Ingat selalu username dan password anda karena digunakan untuk login.
      <a href="{{ url('formRegisMasyarakat') }}">Daftar.</a>
    </small>
  </div>
@endsection