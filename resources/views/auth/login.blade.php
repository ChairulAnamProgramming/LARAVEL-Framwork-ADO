@extends('templates.auth')

@section('title','Halaman Login')



@section('content_auth')


<div class="card-body px-lg-5 py-lg-5">
    <div class="text-center text-muted mb-4">
      <small>Login</small>
    </div>
    <form role="form" method="POST" action="{{ route('login') }}">
            @csrf
      <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
          </div>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>
        @if ($errors->has('email'))
        <small class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
        </small>
        @endif
      </div>
      <div class="form-group">
        <div class="input-group input-group-alternative">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
          </div>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
        </div>
        @if ($errors->has('password'))
            <small class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
            </small>
        @endif
      </div>
      <div class="custom-control custom-control-alternative custom-checkbox">
        <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="custom-control-label" for=" customCheckLogin">
          <span class="text-muted">Ingat Saya</span>
        </label>
      </div>
      <div class="text-center">
        <button class="btn btn-primary my-4">Masuk</button>
      </div>
    </form>
  </div>

@endsection 
