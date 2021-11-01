@include('header2')
<div class="card-header">Pengembalian Buku</div>
  <div class="card-body">
    <a class="btn btn-danger btn-block" href="{{ route('petugasDashboard') }}">Kembali</a><br/><br/>
    <form action="{{ route('form_kembali') }}"  autocomplete="on" method="post">
      @csrf
			@if(session('errors'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Something it's wrong:
				<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button> -->
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

      <!-- PENGEMBALIAN START -->
      <table class="table table-striped">
        @if($query->isNotEmpty())
        <tr>
          <th>ISBN</th>
          <th>Judul</th>
          <th>NIM Peminjam</th>
          <th>Tanggal Peminjaman</th>
          <th>Denda</th>
          <th>Status</th>
          <th>Option</th>
        </tr>
        @foreach( $query as $book )
        <tr>
          <td>{{ $book->isbn }}</td>
          <td>{{ $book->judul }}</td>
          <td>{{ $book->nim }}</td>
          <td>{{ $book->tgl_pinjam }}</td>
          <td>{{ $book->denda }}</td>
          <td>{{ $book->tgl_kembali == null ? 'Belum dikembalikan' : 'Sudah dikembalikan' }}</td>
          <input type="hidden" name="idtransaksi" value="{{ $book->idtransaksi }}">
          <input type="hidden" name="nim" value="{{ $book->nim }}">
          <td>
            @if($book->tgl_kembali == null)
            <button type="submit" class="btn btn-primary btn-sm my-1">Kembalikan</button>
            <!-- <a class="btn btn-primary btn-sm my-1" href="">Kembalikan</a> -->
            <!-- <a class="btn btn-danger btn-sm" href="hapusBuku/{{ $book->idbuku }}">Delete</a> -->
            @endif
          </td>
        </tr>
        @endforeach
        @else
        <div>
          <p class="card-text">There's no data in buku. Please try again later!</p>
        </div>
        @endif
      </table>
      <!-- PENGEMBALIAN END -->

    </form>
  </div>
@include('footer2')
