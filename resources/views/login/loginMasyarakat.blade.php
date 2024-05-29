@extends('login.layouts.login')
@section('loginMasyarakat')

<link rel="stylesheet" href="css/login.css">
    <!-- partial:index.partial.html -->
    <nav>
      <a href="{{ url('/') }}"><h1>&LeftTeeArrow; Kembali</h1></a>
    </nav>
<div class="container flex">
  <div class="facebook-page flex">
    <div class="text">
      <h1>Sistem LelangKU</h1>
      <p>Kami membantu lelang anda</p>
      <p>dan Berkomitmen untuk sukses.</p>
    </div>
    <form action="{{ url('postLoginMasyarakat') }}" method="post">
      @if(\Session::has('alert'))
                  <div class="alert alert-danger">
                      <div>{{Session::get('alert')}}</div>
                  </div>
              @endif
              <!-- bacaan 'alert' diambil dari with pass redirect -->
              @if(\Session::has('alert-success'))
                  <div class="alert alert-success">
                      <div>{{Session::get('alert-success')}}</div>
                  </div>
              @endif
        @csrf
        <input type="text" placeholder="Masukan username anda" name="username" id="username" required autofocus>
        <input type="password" placeholder="Kata sandi" name="pass" id="pass" required>
        <div class="link">
          <button type="submit" class="login">Login</button>
          <p class="forgot">Belum punya akun?</p>
        </div>
        <hr>
        <div class="button">
          <a href="{{ url('formRegisMasyarakat') }}">Daftar sekarang!</a>
        </div>
      </form>
    </div>
  </div>
  <!-- partial -->
  
@endsection