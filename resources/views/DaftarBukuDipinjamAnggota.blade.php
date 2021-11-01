@include('header2')
<div class="card-header">Daftar Buku Anggota</div>
  <div class="card-body">
    <!-- lihat buku start -->
    <a class="btn btn-danger btn-block" href="{{ route('anggotaDashboard') }}">Kembali</a><br/><br>
    <table class="table table-striped">
      @if($query->isNotEmpty())
      <tr>
        <th>ID Transaksi</th>
        <th>Tanggal Peminjaman</th>
        <th>ISBN</th>
        <th>Judul Buku</th>
        <th>Kategori</th>
        <th>Pengarang</th>
        <th>NIM Anggota</th>
        <th>Nama Petugas</th>
        <th>Total Denda</th>
        <!-- <th>jumlah</th>
        <th>tersedia</th> -->
      </tr>
      @foreach( $query as $row )
      <tr>
        <td>{{ $row->idtransaksi }}</td>
        <td>{{ $row->tgl_pinjam }}</td>
        <td>{{ $row->isbn }}</td>
        <td>{{ $row->judul }}</td>
        <td>{{ $row->Kategori }}</td>
        <td>{{ $row->pengarang }}</td>
        <td>{{ $row->nim }}</td>
        <td>{{ $row->namaPetugas }}</td>
        <td>{{ $row->total_denda }}</td>
        <!-- <td>{{ $row->stok }}</td>
        <td>{{ $row->stok_tersedia }}</td> -->
        <!-- <td>
          <a class="btn btn-warning btn-sm my-1" href="">Edit</a>
        </td> -->
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
