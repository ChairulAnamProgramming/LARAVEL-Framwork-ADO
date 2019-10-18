@extends('templates.main')

@section('title','Buat Surat Permohonan Perpanjang Kontrak')

@section('content')
@if (session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif


<div class="row justify-content-center">
  <div class="col-sm-8">
          <div class="card bg-secondary shadow">
                  <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h3 class="mb-0">Buat Surat</h3>
                      </div>
                      <div class="col-4 text-right">
                        {{-- <a href="#" class="btn btn-sm btn-info">Settings</a> --}}
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                <form action="{{url('perpanjang_kontrak')}}" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                            <input type="number" id="no_surat" name="no_surat" class="form-control form-control-alternative" placeholder="Nomor Surat">
                                            @if ($errors->has('no_surat'))
                                            <small class="text-danger">
                                                    <strong>{{ $errors->first('no_surat') }}</strong>
                                            </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                           <select name="jenis_surat" id="jenis_surat" class="form-control">
                                               <option value="">Pilih Jenis Surat</option>
                                               <option value="MMI">MMI</option>
                                               <option value="JC">JC</option>
                                           </select>
                                            @if ($errors->has('jenis_surat'))
                                            <small class="text-danger">
                                                    <strong>{{ $errors->first('jenis_surat') }}</strong>
                                            </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <input type="date" id="tanggal" name="tanggal" class="form-control form-control-alternative" value="{{date('Y-m-d')}}">
                                            @if ($errors->has('tanggal'))
                                            <small class="text-danger">
                                                    <strong>{{ $errors->first('tanggal') }}</strong>
                                            </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                      <hr class="my-4">
                      <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <button class="btn btn-primary"><i class="ni ni-email-83"></i>  Buat Surat</button>
                            </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
  </div>
  </div>




@endsection