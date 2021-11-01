@include('header')
<div class="card-header">Hapus Data Kategori</div>
  <div class="card-body">
    <form action="{{ route('delete_category', $kategori->idkategori) }}"  autocomplete="on" method="post">
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

      <table class="table table-striped">
        <tr><td>ID Kategori</td><td>:</td><td>{{ $kategori->idkategori }}</td></tr>
        <tr><td>Nama Kategori</td><td>:</td><td>{{ $kategori->nama }}</td></tr>
      </table>
      <p>Are you sure want to delete this item?</p>
			<button type="submit" class="btn btn-danger" name="submit" value="submit">Yes</button>
			<a class="btn btn-secondary" href="{{ route('view_category') }}">No</a>

    </form>
  </div>
@include('footer')
