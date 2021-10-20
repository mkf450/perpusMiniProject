@include('header2')
<div class="card-header">Hapus Data Buku</div>
  <div class="card-body">
    <form action="{{ route('delete_books', $buku->idbuku) }}"  autocomplete="on" method="post">
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
      <table class="table  table-striped">
        <tr><td>ID</td><td>:</td><td>{{ $buku->idbuku }}</td></tr>
        <tr><td>ISBN</td><td>:</td><td>{{ $buku->isbn }}</td></tr>
        <tr><td>Judul</td><td>:</td><td>{{ $buku->judul }}</td></tr>
        <tr><td>Kategori</td><td>:</td><td>{{ $buku->idkategori }}</td></tr>
        <tr><td>Pengarang</td><td>:</td><td>{{ $buku->pengarang }}</td></tr>
        <tr><td>Penerbit</td><td>:</td><td>{{ $buku->penerbit }}</td></tr>
      </table>
      <p>Are you sure want to delete this item?</p>
			<button type="submit" class="btn btn-danger" name="submit" value="submit">Yes</button>
			<a class="btn btn-secondary" href="{{ route('view_books') }}">No</a>
      <!-- ADD BUKU END -->

    </form>
  </div>
@include('footer2')
