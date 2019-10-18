@extends('templates.main')

@section('title','Tambah Absen Baru')


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
                <h3 class="mb-0">Tambah Absen Baru</h3>
              </div>
              <div class="col-4 text-right">
                {{-- <a href="#" class="btn btn-sm btn-info">Settings</a> --}}
              </div>
            </div>
          </div>
          <div class="card-body">
        <form action="{{url('/merge')}}" method="post" enctype="multipart/form-data">
            @csrf

              {{-- <h6 class="heading-small text-muted mb-4">Informasi Karyawan</h6> --}}
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <input type="hidden" id="id_karyawan" name="id_karyawan" class="form-control form-control-alternative" placeholder="Id Karyawan">
                      <input type="text" id="nik" name="nik" class="form-control form-control-alternative" placeholder="Enter NIK Karyawan">
                        @if ($errors->has('id_karyawan'))
                              <small class="text-danger">
                                      <strong>{{ $errors->first('id_karyawan') }}</strong>
                              </small>
                        @endif
                    </div>
                  </div>
                  <div class="col-lg-6">
                      <h2 id="nama_karyawan"></h2>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="in" name="in" class="form-control form-control-alternative ">
                                <option value="">IN</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                            @if ($errors->has('in'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('in') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="in_keterangan" name="in_keterangan" class="form-control form-control-alternative ">
                                <option value="">IN Keterangan</option>
                                <option value="0">Libur</option>
                                <option value="1">Sakit</option>
                                <option value="2">Izin</option>
                                <option value="3">Skors</option>
                                <option value="4">Alpa</option>
                            </select>
                            @if ($errors->has('in_keterangan'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('in_keterangan') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="out" name="out" class="form-control form-control-alternative ">
                                <option value="">OUT</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                            @if ($errors->has('out'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('out') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="jam_kerja" name="jam_kerja" class="form-control form-control-alternative ">
                                <option value="">Jam Kerja</option>
                                <option value="0">0 Jam</option>
                                <option value="7">7 Jam</option>
                            </select>
                            @if ($errors->has('jam_kerja'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('jam_kerja') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="r" name="r" class="form-control form-control-alternative ">
                                <option value="">R</option>
                                <option value="">Null</option>
                            </select>
                            @if ($errors->has('r'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('r') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="jam_pokok" name="jam_pokok" class="form-control form-control-alternative ">
                                <option value="">Jam Pokok</option>
                                <option value="5">5 Jam</option>
                                <option value="6">6 Jam</option>
                                <option value="7">7 Jam</option>
                                <option value="">NULL</option>
                            </select>
                            @if ($errors->has('jam_pokok'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('jam_pokok') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="lembur" name="lembur" class="form-control form-control-alternative ">
                                <option value="">Lembur</option>
                                <option value="2.0">2.0</option>
                                <option value="7.0">7.0</option>
                                <option value="">NULL</option>
                            </select>
                            @if ($errors->has('lembur'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('lembur') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="n1_5" name="n1_5" class="form-control form-control-alternative ">
                                <option value="">1.5</option>
                                <option value="1">1</option>
                                <option value="">NULL</option>
                            </select>
                            @if ($errors->has('n1_5'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('n1_5') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="n2" name="n2" class="form-control form-control-alternative ">
                                <option value="">2</option>
                                <option value="1">1</option>
                                <option value="7">7</option>
                                <option value="">NULL</option>
                            </select>
                            @if ($errors->has('n2'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('n2') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="n3" name="n3" class="form-control form-control-alternative ">
                                <option value="">3</option>
                                <option value="1">1</option>
                                <option value="7">7</option>
                                <option value="">NULL</option>
                            </select>
                            @if ($errors->has('n3'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('n3') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="n4" name="n4" class="form-control form-control-alternative ">
                                <option value="">4</option>
                                <option value="1">1</option>
                                <option value="7">7</option>
                                <option value="">NULL</option>
                            </select>
                            @if ($errors->has('n4'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('n4') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group text-center">
                            <select id="jam_lembur" name="jam_lembur" class="form-control form-control-alternative ">
                                <option value="">Jam Lembur</option>
                                <option value="3.5">3.5</option>
                                <option value="5.5">5.5</option>
                                <option value="14">14</option>
                                <option value="17">17</option>
                                <option value="">NULL</option>
                            </select>
                            @if ($errors->has('jam_lembur'))
                                <small class="text-danger">
                                        <strong>{{ $errors->first('jam_lembur') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <input type="date" id="tanggal" name="tanggal" class="form-control form-control-alternative" value="{{date('Y-m-d')}}">
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <label for="on"><input type="radio" name="status_onoff" value="ON" id="on" checked>ON</label>
                            <label for="off"><input type="radio" name="status_onoff" value="OFF" id="off">OFF</label>
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


@section('script')
    <script>
        $('#in_keterangan').on('change',function(){
                $('#out').val('');
            const val_in_keterangan= $(this).val()
            console.log(val_in_keterangan);

            if(val_in_keterangan != null){
                $('#out').val(0);
            }

        })


        $('#nik').on('input keyupt',function(){
            const nik = $('#nik').val();
            $('#nama_karyawan').html('')
            $('#id_karyawan').val('');

            $.ajax({
                url:'{{url("merge/carinik")}}',
                type:'get',
                data:{
                    nik:nik
                },
                success:function(data){
                    karyawan = JSON.parse(data);

                    if (!karyawan) {
                        $('#nama_karyawan').html('NIK Belum Terdaftar')
                    } else {
                        $('#nama_karyawan').html(karyawan.name)
                        $('#id_karyawan').val(karyawan.id)
                    }

                }
            });
        });
    </script>
@endsection