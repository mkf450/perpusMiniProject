@include('header')
<div class="card-header">Lihat Kategeori</div>
  <div class="card-body">
    <!-- lihat kategori start -->
			@if(session('errors'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Something it's wrong:
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

    <a class="btn btn-primary" href="{{ route('add_category') }}">+ Add Book Category</a>
    <a class="btn btn-danger btn-block" href="{{ route('petugasDashboard') }}">Kembali</a><br/><br/>
    <table class="table table-striped">
      @if($kategori->isNotEmpty())
      <tr>
        <th>id</th>
        <th>nama</th>
        <th>option</th>
      </tr>
      @foreach( $kategori as $cat )
      <tr>
        <td>{{ $cat->idkategori }}</td>
        <td>{{ $cat->nama }}</td>
        <td>
          <a class="btn btn-warning btn-sm my-1" href="editKategori/{{ $cat->idkategori }}">Edit</a>
          <a class="btn btn-danger btn-sm" href="hapusKategori/{{ $cat->idkategori }}">Delete</a>
          <!-- <p>apaya</p> -->
        </td>
      </tr>
      @endforeach
      @else
      <div>
        <p class="card-text">There's no data in kategori. Please try again later!</p>
      </div>
      @endif
    </table>
    <!-- lihat buku end -->
  </div>
@include('footer')
