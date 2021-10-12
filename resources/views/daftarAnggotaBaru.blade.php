@include('header')
<div class="card-header">Pendaftaran Anggota Baru</div>
  <div class="card-body">
    <form action="{{ route('add') }}"  autocomplete="on" method="post">
      @csrf
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

      <!-- DAFTAR START -->
      <table class="table">
        <div class="form-group row">
          <label for="nim" class="col-sm-2 col-form-label">NIM : </label>
          <div class="col-sm-10">
            <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukan NIM" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Nama : </label>
          <div class="col-sm-10">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password : </label>
          <div class="col-sm-10">
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat : </label>
          <div class="col-sm-10">
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="kota" class="col-sm-2 col-form-label">Kota : </label>
          <div class="col-sm-10">
            <input type="text" name="kota" id="kota" class="form-control" placeholder="Masukan Kota" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email : </label>
          <div class="col-sm-10">
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="no_telp" class="col-sm-2 col-form-label">No telp : </label>
          <div class="col-sm-10">
            <input type="number" name="telp" id="telp" class="form-control" placeholder="Masukan Nomor Telp" required/><br>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Daftar</button>
        <button type="reset" class="btn btn-danger mt-3 mx-2">Reset</button>
      </table>
      <!-- DAFTAR END -->
      
    </form>
  </div>
@include('footer')
