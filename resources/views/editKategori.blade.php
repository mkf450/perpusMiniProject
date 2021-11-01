@include('header')
<div class="card-header">Ubah Data Buku</div>
<div class="card-body">
  <form action="{{ route('edit_category', $kategori->idkategori) }}" autocomplete="on" method="post">
    @csrf
    @if (session('errors'))
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
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

    <table class="table">
      <div class="form-group row">
        <label for="nama" class="col-sm-4 col-form-label">Kategori : </label>
        <div class="col-sm-8">
          <input type="text" name="nama" id="nama" class="form-control"
          placeholder="Masukkan kategori" value="{{ $kategori->nama }}" required><br>
        </div>
      </div>
      <button type="submit" class="btn btn-primary m-1">Ubah</button>
      <a class="btn btn-secondary ms-2 m-1" href="{{ route('view_category') }}">Kembali</a>
    </table>
  </form>
</div>
@include('footer')
