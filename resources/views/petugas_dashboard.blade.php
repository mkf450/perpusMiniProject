<!DOCTYPE html>
<html>
<head>
  <title>Custom Auth in Laravel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
      <!-- <a class="navbar-brand mr-auto" href="#">PositronX</a> -->
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse w-100 order-3" id="navbarNav">
        <ul class="navbar-nav" style="align-items: right">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register-user') }}">Register</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signout') }}">Logout</a>
          </li>
          @endguest
        </ul>
      </div> -->
      <!-- <div class="container-fluid"> -->
      <a class="navbar-brand" href="#">
        <!-- <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">--> Bootstrap
      </a>
      <div class="collapse navbar-collapse w-100 order-3" id="navbarNav">
        <ul class="navbar-nav">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register-user') }}">Register</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signout') }}">Logout</a>
          </li>
          @endguest
        </ul>
      </div>
      <!-- </div> -->
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-12 row">
        <!-- isi -->
        <h3 class="mt-4 mb-2">List Fitur</h3>
        <p>Perpustakaan</p>
        <div class="mt-4 mx-2 card col-4">
          <p style="font-size: 16px" class="px-2 py-2"><a style="text-decoration: none; color: #121212" href="{{ route('search') }}">Pencarian buku</a></p>
        </div>
        <div class="mt-4 mx-2 card col-4">
          <p style="font-size: 16px" class="px-2 py-2"><a style="text-decoration: none; color: #121212" href="{{ route('anggota_regis') }}">Daftar anggota baru</a></p>
        </div>
        <div class="mt-4 mx-2 card col-4">
          @foreach( $petugas as $admin )
          <p style="font-size: 16px" class="px-2 py-2"><a style="text-decoration: none; color: #121212" href="">Peminjaman buku</a></p>
          @endforeach
        </div>
        <div class=" list-event mt-4 mx-2 card col-4">
          <p style="font-size: 16px" class="px-2 py-2"><a style="text-decoration: none; color: #121212" href="">Pengembalian buku</a></p>
        </div>
        <div class=" list-event mt-4 mx-2 card col-4">
          <p style="font-size: 16px" class="px-2 py-2"><a style="text-decoration: none; color: #121212" href="{{ route('view_books') }}">Data buku dan kategori</a></p>
        </div>
        <div class=" list-event mt-4 mx-2 card col-4">
          <p style="font-size: 16px" class="px-2 py-2"><a style="text-decoration: none; color: #121212" href="">Daftar peminjam buku</a></p>
        </div>
        <div class=" list-event mt-4 mx-2 card col-4">
          <p style="font-size: 16px" class="px-2 py-2"><a style="text-decoration: none; color: #121212" href="">Daftar buku yang dipinjam</a></p>
        </div>
        <!-- isi -->
      </div>
      <!-- COBA NYARI ID PETUGAS -->
      <div class="col-lg-12 mt-5">
        @foreach( $petugas as $admin )
          <p>{{ $admin->idpetugas }}</p>
          <p>{{ $admin->nama }}</p>
        @endforeach
      </div>
      <!-- PERCOBAAN BERHASIL -->
    </div>
  </div>
  @yield('content')
</body>
</html>
