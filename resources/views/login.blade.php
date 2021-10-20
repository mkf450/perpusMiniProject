@include('header')
<div class="card-header">Login</div>
<div class="card-body">
  <form method="POST" action="{{ route('masuk') }}">
    @csrf
    <div class="form-group mb-3">
      <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
      autofocus>
      @if ($errors->has('email'))
      <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div class="form-group mb-3">
      <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
      @if ($errors->has('password'))
      <span class="text-danger">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="form-group mb-3 d-flex">
      <p class="me-1">Belum punya akun?</p>
      <a style="text-decoration: none" href="{{ route('petugas_regis') }}">Register</a>
    </div>

    <div class="d-grid mx-auto">
      <button type="submit" class="btn btn-dark btn-block">Login</button>
    </div>
  </form>

</div>
@include('footer')
