@include('header2')
<div class="card-header">Cari Data Buku</div>
  <div class="card-body">
    <form action="{{ route('cari') }}" method="get">
      <!-- SERACH START -->
      <table class="table table-striped">
        <div class="form-group row">
          <div class="col-sm-10">
            <input type="text" name="search" class="form-control" placeholder="Masukan judul buku" required/><br>
          </div>
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Search</button>
            <a class="btn btn-danger btn-block" href="{{ route('guest') }}">Kembali</a>
          </div>
        </div>
        @if($buku->isNotEmpty())
        <tr>
          <th>idbuku</th>
          <th>ISBN</th>
          <th>Judul</th>
          <th>Kategori</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Kota Penerbit</th>
          <th>Editor</th>
          <th>Stok</th>
          <th>Tersedia</th>
          <!-- <th>option</th> -->
        </tr>
        @foreach ($buku as $book)
        <tr>
          <td>{{ $book->idbuku }}</td>
          <td>{{ $book->isbn }}</td>
          <td>{{ $book->judul }}</td>
          <td>{{ $book->nama }}</td>
          <td>{{ $book->pengarang }}</td>
          <td>{{ $book->penerbit }}</td>
          <td>{{ $book->kota_penerbit }}</td>
          <td>{{ $book->editor }}</td>
          <td>{{ $book->stok }}</td>
          <td>{{ $book->stok_tersedia }}</td>
          <!-- <td>
            <a class="btn btn-warning btn-sm" href="">Edit</a>
            <a class="btn btn-danger btn-sm" href="">Delete</a>
          </td> -->
        </tr>
        @endforeach
        @else
        <div>
          <p class="card-text">There's no data in buku. Please try again later!</p>
        </div>
        @endif
      </table>
    </form>
  </div>
@include('footer2')
