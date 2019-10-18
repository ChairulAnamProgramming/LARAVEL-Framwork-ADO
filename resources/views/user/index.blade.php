@extends('templates.main')

@section('title','Profilku')


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
                <p class="text-white mt-0 mb-5">Ini adalah halaman profil Anda. Anda dapat melihat data Anda dan nilai pekerjaan Anda .</p>
                <a href="#" class="btn btn-info">Edit profile</a>
              </div>
            </div>
          </div>
@endsection

@section('content')
          

<div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{url('assets/img/users')}}/{{Auth::user()->image}}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Kontak</a>
                <a href="#" class="btn btn-sm btn-default float-right">Pesan</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
             
              <div class="text-center mt-5">
                <h3>
                  {{Auth::user()->name}}
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{Auth::user()->email}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Desa Tambak Bitin Kec.Daha Utara
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Data Akun Saya</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
            <form action="{{url('/user').'/'.Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <h6 class="heading-small text-muted mb-4">Data Saya</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control form-control-alternative" placeholder="Nama" value="{{Auth::user()->name}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Alamat Email</label>
                      <input type="email" id="email" name="email" readonly class="form-control form-control-alternative" placeholder="Email" value="{{Auth::user()->email}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control form-control-alternative" placeholder="NIK" value="{{Auth::user()->nik}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="role">Role</label>
                      <input type="text" id="role" name="role" class="form-control form-control-alternative" placeholder="Role" value="{{Auth::user()->role}}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="gambar">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="form-control form-control-alternative" placeholder="gambar">
                        @if ($errors->has('gambar'))
                              <small class="text-danger">
                                      <strong>{{ $errors->first('gambar') }}</strong>
                              </small>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                
                <div class="row">
                    <div class="col-lg-6">
                       <button class="btn btn-primary">Ubah Profil</button>
                    </div> 
                </div>
                
              </form>
            </div>
          </div>
        </div>
        </div>




@endsection