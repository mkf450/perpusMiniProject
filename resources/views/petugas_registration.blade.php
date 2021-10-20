@include('header')
<div class="card-header">Register Petugas</div>
<div class="card-body">

  <form action="{{ route('petugas_daftar') }}" method="POST">
    @csrf
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

    <div class="form-group mb-3 d-flex">
      <p class="me-1">Sudah punya akun?</p>
      <a style="text-decoration: none" href="{{ route('login') }}">Login</a>
    </div>

    <div class="d-grid mx-auto">
      <button type="submit" class="btn btn-dark btn-block">Register</button>
    </div>
  </form>

</div>
@include('footer')
