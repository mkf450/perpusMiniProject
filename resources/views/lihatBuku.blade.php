@include('header2')
<div class="card-header">Pendaftaran Anggota Baru</div>
  <div class="card-body">
    <!-- lihat buku start -->
    <a class="btn btn-primary" href="{{ route('add_books') }}">+ Add Book Data</a>
    <a class="btn btn-secondary" href="{{ route('add_category') }}">+ Add Book Category</a>
    <a class="btn btn-danger btn-block" href="{{ route('petugasDashboard') }}">Kembali</a><br/><br/>
    <table class="table table-striped">
      @if($buku->isNotEmpty())
      <tr>
        <th>idbuku</th>
        <th>isbn</th>
        <th>judul</th>
        <th>kategori</th>
        <th>pengarang</th>
        <th>penerbit</th>
        <th>kota</th>
        <th>editor</th>
        <th>gambar</th>
        <th>jumlah</th>
        <th>tersedia</th>
        <th>option</th>
      </tr>
      @foreach( $buku as $book )
      <tr>
        <td>{{ $book->idbuku }}</td>
        <td>{{ $book->isbn }}</td>
        <td>{{ $book->judul }}</td>
        <td>{{ $book->idkategori }}</td>
        <td>{{ $book->pengarang }}</td>
        <td>{{ $book->penerbit }}</td>
        <td>{{ $book->kota_penerbit }}</td>
        <td>{{ $book->editor }}</td>
        <td>{{ $book->file_gambar }}</td>
        <td>{{ $book->stok }}</td>
        <td>{{ $book->stok_tersedia }}</td>
        <td>
          <a class="btn btn-warning btn-sm my-1" href="editBuku/{{ $book->idbuku }}">Edit</a>
          <a class="btn btn-danger btn-sm" href="hapusBuku/{{ $book->idbuku }}">Delete</a>
        </td>
      </tr>
      @endforeach
      @else
      <div>
        <p class="card-text">There's no data in buku. Please try again later!</p>
      </div>
      @endif
    </table>
    <!-- lihat buku end -->
  </div>
@include('footer2')
