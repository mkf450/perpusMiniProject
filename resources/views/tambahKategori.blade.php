@include('header')
<div class="card-header">Tambah Kategori Buku</div>
  <div class="card-body">
    <form action="{{ route('add_category') }}"  autocomplete="on" method="post">
      @csrf
			@if(session('errors'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Something it's wrong:
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
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

      <!-- ADD BUKU START -->
      <table class="table">
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Kategori : </label>
          <div class="col-sm-10">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama kategori" required/><br>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <a class="btn btn-secondary ms-2" href="{{ route('view_books') }}">Back</a>
      </table>
      <!-- ADD BUKU END -->

    </form>
  </div>
@include('footer')
