@extends('templates.main')

@section('title','Ubah Password')


@section('content_header')
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
     <!-- Mask -->
     {{-- <span class="mask bg-gradient-default opacity-8"></span> --}}

     <!-- Header container -->
     <div class="container-fluid d-flex align-items-center">
            <div class="row">
              <div class="col-lg-10 col-md-10">
                <h1 class="display-2 text-white">{{Auth::user()->name}}</h1>
                <p class="text-white mt-0 mb-5">Ini adalah halaman ubah password. Ubah password untuk keamanan data anda .</p>
                <a href="{{url('/user')}}" class="btn btn-info">Edit profile</a>
              </div>
            </div>
          </div>
@endsection

@section('content')
          
<div class="row justify-content-center">
  <div class="col-sm-8">
          <div class="card bg-secondary shadow">
                  <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h3 class="mb-0">Edit Password</h3>
                      </div>
                      <div class="col-4 text-right">
                        {{-- <a href="#" class="btn btn-sm btn-info">Settings</a> --}}
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                <form action="{{url('user/ubah_password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                            <input type="password" id="password_lama" name="password_lama" class="form-control form-control-alternative" placeholder="Password Lama"><br>
                                            @if ($errors->has('password_lama'))
                                            <small class="text-danger">
                                                    <strong>{{ $errors->first('password_lama') }}</strong>
                                            </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                            <input type="password" id="password_baru" name="password_baru" class="form-control form-control-alternative" placeholder="Password Baru"><br>
                                            @if ($errors->has('password_baru'))
                                            <small class="text-danger">
                                                    <strong>{{ $errors->first('password_baru') }}</strong>
                                            </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                            <input type="password" id="konfirmasi" name="konfirmasi" class="form-control form-control-alternative" placeholder="Konfirmasi Password"><br>
                                            @if ($errors->has('konfirmasi'))
                                            <small class="text-danger">
                                                    <strong>{{ $errors->first('konfirmasi') }}</strong>
                                            </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                      <hr class="my-4">
                      <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <button class="btn btn-primary"><i class="ni ni-key-25"></i>  Ganti Password</button>
                            </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
  </div>
  </div>




@endsection