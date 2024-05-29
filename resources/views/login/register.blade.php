@extends('login.layouts.register')
@section('registerAdmin')
<link rel="stylesheet" href="css/register.css">

<nav>
    <a href="{{ url('admin/home') }}"><h1>Sistem lelangKU</h1></a>
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
    <h2>Tambah akun petugas</h2>
    <form action="{{ url('postRegisAdmin') }}" method="post">
      @csrf
      <div class="form-control">
        <input type="text" required name="nama_petugas" id="nama_petugas" autofocus>
        <label>Nama</label>
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
      <label>Role</label>
      <div class="form-control">
        <select class="" name="id_role" id="id_role"><br>
          <option disabled selected>-- Pilih Role --</option>
          @foreach ($id_role as $role)
          <option value="{{ $role->id_role }}">{{ $role->role }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit">Daftar</button>
    </form>
    <p>Batal menambahkan akun baru? <a href="{{ url('admin/home') }}">Kembali</a></p>
  </div>
@endsection