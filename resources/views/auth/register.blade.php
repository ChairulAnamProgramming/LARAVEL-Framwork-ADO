@extends('templates.auth')
@section('title','Halaman Registrasi')
    
@section('content_auth')


    
<div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
          <small>Register</small>
        </div>
        <form role="form" method="POST" action="{{ route('register') }}">
                @csrf
          <div class="form-group mb-3">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
              </div>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            @if ($errors->has('name'))
            <small class="text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
            </small>
            @endif
          </div>
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
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
            </div>
            @if ($errors->has('password'))
            <small class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
            </small>
            @endif
          </div>
          <div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
              </div>
              <input id="password-confirm" type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>
          <div class="text-center">
            <button class="btn btn-primary my-4">Buat Akun</button>
          </div>
        </form>
      </div>
    
@endsection
