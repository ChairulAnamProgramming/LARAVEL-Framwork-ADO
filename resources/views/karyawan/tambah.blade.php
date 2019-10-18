@extends('templates.main')

@section('title','Tambah Karyawan')


@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Tambah Karyawan</h3>
              </div>
              <div class="col-4 text-right">
                {{-- <a href="#" class="btn btn-sm btn-info">Settings</a> --}}
              </div>
            </div>
          </div>
          <div class="card-body">
        <form action="{{url('/karyawan')}}" method="post" enctype="multipart/form-data">
            @csrf

              <h6 class="heading-small text-muted mb-4">Informasi Karyawan</h6>
              <div class="pl-lg-4">
                  <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group focused">
                          <input type="email" id="email" name="email" class="form-control form-control-alternative" placeholder="Email">
                          @if ($errors->has('email'))
                              <small class="text-danger">
                                      <strong>{{ $errors->first('email') }}</strong>
                              </small>
                          @endif
                        </div>
                      </div>
                    </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control form-control-alternative" placeholder="Nama Lengkap">
                        @if ($errors->has('nama_karyawan'))
                              <small class="text-danger">
                                      <strong>{{ $errors->first('nama_karyawan') }}</strong>
                              </small>
                        @endif
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="number"  min="0" id="nik" name="nik" class="form-control form-control-alternative" placeholder="NIK">
                      @if ($errors->has('nik'))
                            <small class="text-danger">
                                    <strong>{{ $errors->first('nik') }}</strong>
                            </small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <input type="date" id="tmk" name="tmk" class="form-control form-control-alternative" placeholder="TMK">
                      @if ($errors->has('tmk'))
                            <small class="text-danger">
                                    <strong>{{ $errors->first('tmk') }}</strong>
                            </small>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <input type="number" min="0" id="ktp" name="ktp" class="form-control form-control-alternative" placeholder="Nomor KTP">
                      @if ($errors->has('ktp'))
                            <small class="text-danger">
                                    <strong>{{ $errors->first('ktp') }}</strong>
                            </small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group focused">
                      <select id="role" name="role" class="form-control">
                        <option value="">Pilih Role</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                      <select>
                      @if ($errors->has('role'))
                            <small class="text-danger">
                                    <strong>{{ $errors->first('role') }}</strong>
                            </small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                   <div class="row">
                       <div class="col-lg-6">
                            <div class="form-group focused">
                                <input type="text"id="tempat" name="tempat"class="form-control form-control-alternative" placeholder="Tempat Lahir">
                                @if ($errors->has('tempat'))
                                      <small class="text-danger">
                                              <strong>{{ $errors->first('tempat') }}</strong>
                                      </small>
                                @endif
                            </div>
                       </div>
                       <div class="col-lg-6">
                            <div class="form-group focused">
                                <input  type="date" id="tanggal" name="tanggal" value="{{date('Y-m-d')}}"  class="form-control form-control-alternative" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group focused">
                        
                        <div class="input-group mb-3">
                                <select  name="bagian" id="bagian" class="custom-select form-control-alternative">
                                        <option value="">Pilih Bagian</option>
                                        @foreach ($bagian as $item)
                                            <option value="{{$item->id_bagian}}">{{$item->nama_bagian}}</option>
                                        @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#modal-form"><i class="ni ni-fat-add"></i></button>
                                </div>
                            </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                    <div class="form-group focused">
                        <textarea rows="4" class="form-control form-control-alternative" name="alamat" id="alamat" placeholder="Alamat lengkap"></textarea>
                        @if ($errors->has('alamat'))
                              <small class="text-danger">
                                      <strong>{{ $errors->first('alamat') }}</strong>
                              </small>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-4">
                        <button class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>





<div class="row">
    <div class="col-md-4">
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary shadow border-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-4">
                                        <small>Tambahkan bagian baru</small>
                                    </div>
                                    <form role="form" action="{{url('/bagian')}}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-vector"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Enter Bagian" type="text" name="nama_bagian">
                                            </div>
                                            @if ($errors->has('nama_bagian'))
                                                  <small class="text-danger">
                                                          <strong>{{ $errors->first('nama_bagian') }}</strong>
                                                  </small>
                                            @endif
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-tv-2"></i></span>
                                                </div>
                                                <select name="status" id="status"  class="form-control">
                                                    <option value="">Pilih Status</option>
                                                    <option value="MMI">MMI</option>
                                                    <option value="JC">JC</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('status'))
                                                  <small class="text-danger">
                                                          <strong>{{ $errors->first('status') }}</strong>
                                                  </small>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary my-4">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
   

@endsection
