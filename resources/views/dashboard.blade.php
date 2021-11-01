<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon ico -->
  <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('/assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- Local CSS -->
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  <!-- ajax -->
  <script src="{{ asset('/assets/js/ajax.js') }}"></script>
  <!-- Local CSS -->
  <style media="screen">
    .error { color: #ff0000; }
    /* .card { width: 1500px;} */
  </style>
  <title>Mini-Project : Perpustakaan</title>
</head>
<body>
  <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #f8f8f8;">
    <div class="container">
      <!-- <img src="{{ asset('/assets/images/favicon.ico') }}" alt="Girl in a jacket" width="15px" height="18px" class="me-2">-->
      <a class="navbar-brand" href="#">
        <!-- <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">--> <b> Mini Project Perpus</b>
      </a>
      <div class="collapse navbar-collapse w-100 order-3 justify-content-end" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas_regis') }}">Register</a>
          </li>
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
        <p>Perpustakaan (Guest Mode)</p>

        @if(session('errors'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Something it's wrong:
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if (Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
			@if (Session::has('error'))
			<div class="alert alert-danger">
				{{ Session::get('error') }}
			</div>
			@endif

        <div class="mt-4 mx-2 card col-4">
          <p style="font-size: 16px" class="px-2 py-2"><a style="text-decoration: none; color: #121212" href="{{ route('cari') }}">Pencarian buku</a></p>
        </div>
      </div>
    </div>
  </div>
  @yield('content')
</body>
</html>
