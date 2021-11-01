@include('header2')
<div class="card-header">Daftar Peminjam Buku</div>
  <div class="card-body">
    <!-- Lihat daftar peminjam buku start -->
    <a class="btn btn-danger btn-block" href="{{ route('petugasDashboard') }}">Kembali</a><br/><br/>
    <table class="table table-striped">
      @if($pinjaman->isNotEmpty())
      <tr>
        <th>ID transaksi</th>
        <th>NIM Anggota</th>
        <th>Tanggal Peminjaman</th>
        <th>Total Denda</th>
        <th>Nama Petugas</th>
        <!-- <th>Option</th> -->
      </tr>
      @foreach( $pinjaman as $pinjam )
      <tr>
        <td>{{ $pinjam->idtransaksi }}</td>
        <td>{{ $pinjam->nim }}</td>
        <td>{{ $pinjam->tgl_pinjam }}</td>
        <td>{{ $pinjam->total_denda }}</td>
        <td>{{ $pinjam->namaPetugas }}</td>
        <!-- <td>
          <a class="btn btn-warning btn-sm my-1" href="">Selesai</a>
        </td> -->
      </tr>
      @endforeach
      @else
      <div>
        <p class="card-text">There's no data in pinjam. Please try again later!</p>
      </div>
      @endif
    </table>
    <!-- Lihat daftar peminjam buku end -->
  </div>
@include('footer2')
