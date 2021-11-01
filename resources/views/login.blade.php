@include('header')
<div class="card-header">Login</div>
<div class="card-body">
  <form method="POST" action="{{ route('masuk') }}">
    @csrf
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
