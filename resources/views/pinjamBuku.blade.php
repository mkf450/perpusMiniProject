@include('header2')
<div class="card-header">Tambah Data Peminjaman</div>
  <div class="card-body">
    <form action="{{ route('pinjam', $petugas->idpetugas) }}" autocomplete="on" method="post">
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
          <label for="nim" class="col-sm-2 col-form-label">Anggota : </label>
          <div class="col-sm-10">
            <select style="color: #707070" name="nim" class="form-control" required>
              <option value="">-- Pilih anggota (peminjam) --</option>
              @foreach( $users as $user )
              <option value="{{ $user->nim }}">{{ $user->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row mt-3">
          <label for="petugas" class="col-sm-2 col-form-label">Petugas : </label>
          <div class="col-sm-10">
            <select style="color: #707070" name="petugas" class="form-control" required>
              <option value="{{ $petugas->idpetugas }}">{{ $petugas->nama }}</option>
            </select>
            <!-- <input type="text" name="petugas" id="petugas" class="form-control" value="{{ $petugas->idpetugas }}" required/>{{ $petugas->nama }}<br> -->
          </div>
        </div>
        <div class="form-group row mt-3">
          <label for="buku" class="col-sm-2 col-form-label">Buku : </label>
          <div class="col-sm-10">
            <select style="color: #707070" name="buku" class="form-control" required>
              <option value="">-- Pilih buku --</option>
              @foreach( $books as $book )
              <option value="{{ $book->idbuku }}">{{ $book->judul }}</option>
              @endforeach
            </select>
          </div>
        </div><br/>
        <!-- <div class="form-group row">
          <label for="buku2" class="col-sm-2 col-form-label">Buku 2 : </label>
          <div class="col-sm-10">
            <select style="color: #707070" name="buku2" class="form-control">
              <option value="">-- Pilih buku 2 --</option>
              @foreach( $books as $book )
              <option value="{{ $book->idbuku }}">{{ $book->judul }}</option>
              @endforeach
            </select><br>
          </div>
        </div> -->

        <!-- <div class="form-group row">
          <label for="buku1" class="col-sm-2 col-form-label">Buku 1 : </label>
          <div class="col-sm-10">
            <input type="text" name="buku1" id="buku1" class="form-control" placeholder="Buku pertama yang ingin dipinjam" required/><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="buku2" class="col-sm-2 col-form-label">Buku 2 : </label>
          <div class="col-sm-10">
            <input type="text" name="buku2" id="buku2" class="form-control" placeholder="Buku kedua yang ingin dipinjam"/><br>
          </div>
        </div> -->
        <!-- <div class="form-group row">
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
        </div> -->
        <button type="submit" class="btn btn-primary">Pinjam</button>
        <a class="btn btn-danger ms-2" href="{{ route('petugasDashboard') }}">Back</a>
      </table>
      <!-- ADD BUKU END -->

    </form>
  </div>
@include('footer2')
