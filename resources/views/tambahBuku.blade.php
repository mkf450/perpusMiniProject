@include('header2')
<div class="card-header">Tambah Data Buku</div>
  <div class="card-body">
    <form action="{{ route('add_books') }}"  autocomplete="on" enctype="multipart/form-data" method="post">
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

      <!-- ADD BUKU START -->
      <table class="table">
        <div class="form-group row">
          <label for="isbn" class="col-sm-2 col-form-label">ISBN : </label>
          <div class="col-sm-10">
            <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Masukan ISBN" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="judul" class="col-sm-2 col-form-label">Judul : </label>
          <div class="col-sm-10">
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Judul" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Kategori : </label>
          <div class="col-sm-10">
            <select style="color: #707070" name="kategori" class="form-control">
              <option value="">-- Pick a category --</option>
              @foreach( $kategori as $category )
              <option value="{{ $category->idkategori }}">{{ $category->nama }}</option>
              @endforeach
            </select><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="pengarang" class="col-sm-2 col-form-label">Pengarang : </label>
          <div class="col-sm-10">
            <input type="text" name="pengarang" id="pengarang" class="form-control" placeholder="Masukan Pengarang" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="penerbit" class="col-sm-2 col-form-label">Penerbit : </label>
          <div class="col-sm-10">
            <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="Masukan Penerbit" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="kota" class="col-sm-2 col-form-label">Kota : </label>
          <div class="col-sm-10">
            <input type="text" name="kota" id="kota" class="form-control" placeholder="Masukan Kota" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="editor" class="col-sm-2 col-form-label">Editor : </label>
          <div class="col-sm-10">
            <input type="text" name="editor" id="editor" class="form-control" placeholder="Masukan Editor" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="gambar" class="col-sm-2 col-form-label">Gambar : </label>
          <div class="col-sm-10">
            <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Masukan Gambar" required><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="stok" class="col-sm-2 col-form-label">Stok : </label>
          <div class="col-sm-10">
            <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukan jumlah stok" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="tersedia" class="col-sm-2 col-form-label">Tersedia : </label>
          <div class="col-sm-10">
            <input type="number" name="tersedia" id="tersedia" class="form-control" placeholder="Masukan jumlah yang tersedia" required/><br>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
        <a class="btn btn-secondary ms-2" href="{{ route('view_books') }}">Back</a>
      </table>
      <!-- ADD BUKU END -->

    </form>
  </div>
@include('footer2')
