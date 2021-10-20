@include('header')

<div class="card-header">Register Anggota</div>
<div class="card-body">

  <form action="{{ route('anggota_daftar') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
      <input type="text" placeholder="NIM" id="nim" class="form-control" name="nim" maxlength="14"
      required autofocus>
      @if ($errors->has('nim'))
      <span class="text-danger">{{ $errors->first('nim') }}</span>
      @endif
    </div>

    <div class="form-group mb-3">
      <input type="text" placeholder="Name" id="name" class="form-control" name="name"
      required autofocus>
      @if ($errors->has('name'))
      <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif
    </div>

    <div class="form-group mb-3">
      <input type="text" placeholder="Email" id="email_address" class="form-control"
      name="email" required autofocus>
      @if ($errors->has('email'))
      <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div class="form-group mb-3">
      <input type="password" placeholder="Password" id="password" class="form-control"
      name="password" required>
      @if ($errors->has('password'))
      <span class="text-danger">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="form-group mb-3">
      <input type="password" placeholder="Confirm Password" id="password_confirmation" class="form-control"
      name="password_confirmation" required>
      @if ($errors->has('password_confirmation'))
      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
      @endif
    </div>

    <div class="form-group mb-3">
      <input type="text" placeholder="alamat" id="alamat" class="form-control" name="alamat"
      required autofocus>
      @if ($errors->has('alamat'))
      <span class="text-danger">{{ $errors->first('alamat') }}</span>
      @endif
    </div>

    <div class="form-group mb-3">
      <input type="text" placeholder="kota" id="kota" class="form-control" name="kota"
      required autofocus>
      @if ($errors->has('kota'))
      <span class="text-danger">{{ $errors->first('kota') }}</span>
      @endif
    </div>

    <div class="form-group mb-3">
      <input type="text" placeholder="Nomor Telp" id="no_telp" class="form-control" name="no_telp"
      required autofocus>
      @if ($errors->has('no_telp'))
      <span class="text-danger">{{ $errors->first('no_telp') }}</span>
      @endif
    </div>

    <div class="d-grid mx-auto">
      <button type="submit" class="mt-3 btn btn-dark btn-block">Register</button>
      <!-- <button type="button" class="btn btn-danger btn-block">Kembali</button> -->
      <a class="mt-2 btn btn-danger btn-block" href="{{ route('petugasDashboard') }}">Kembali</a>
    </div>
  </form>

</div>
@include('footer')
