@extends('templates.main')

@section('title','Tambah Jadwal Roster')


@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
        <div class="row">
          <div class="col-sm-6">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Tambah Jadwal Roster</h3>
                  </div>
                  <div class="col-4 text-right">
                    {{-- <a href="#" class="btn btn-sm btn-info">Settings</a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
              <form action="{{url('/roster')}}" method="post" enctype="multipart/form-data">
                @csrf
    
                <h2 class="text-muted ml-4 mb-4 nama_karyawan"></h2>
                  <div class="pl-lg-4">
                      <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group focused">
                              <input type="text" id="nik" name="nik" class="form-control form-control-alternative" placeholder="nik">
                              <input type="hidden" id="id_karyawan" name="id_karyawan" class="form-control form-control-alternative" placeholder="id karyawan">
                              @if ($errors->has('nik'))
                                    <small class="text-danger">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                    </small>
                              @endif
                              @if ($errors->has('id_karyawan'))
                                    <small class="text-danger">
                                            <strong>{{ $errors->first('id_karyawan') }}</strong>
                                    </small>
                              @endif
                            </div>
                          </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <input type="date"  id="tanggal" name="tanggal" class="form-control form-control-alternative" value="{{date('Y-m-d')}}">
                            @if ($errors->has('tanggal'))
                                  <small class="text-danger">
                                          <strong>{{ $errors->first('tanggal') }}</strong>
                                  </small>
                            @endif
                            </div>
                        </div>
                      <div class="col-lg-6">
                        <div class="form-group focused">
                            <label for="on"><input type="radio" id="on" name="status" value="on"> ON</label>
                            <label for="off"><input type="radio" id="off" name="status" value="off" checked> OFF</label>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <hr class="my-4">
                  <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <button class="btn btn-primary">Jadwalkan</button>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">List Karyawan</h3>
                  </div>
                  <div class="col-4 text-right">
                    {{-- <a href="#" class="btn btn-sm btn-info">Settings</a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush datatables">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Copy</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Bagian</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($karyawan as $item)
                        <tr>
                            <td> {{$item->name}} </td>
                            <td> <span class="btn btn-sm btn-info btn-copy" data-copy="{{$item->nik}}">Copy</span> </td>
                            <td> {{$item->nik}} </td>
                            <td> {{$item->nama_bagian}} </td>
                        </tr>
                      @empty
                          
                      @endforelse
                          
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('script')
    <script>
            $('.btn-copy').on('click',function(){
              const valcopy= $(this).data('copy')
              $('#nik').val(valcopy);
              $('#nik').focus();
            });

            $('#nik').on('input focus',function(){
                const val_nik = $('#nik').val();
                $('.nama_karyawan').html('');
                $('#id_karyawan').val('');
                $.ajax({
                    url:"{{url('/roster/search').'/'}}"+val_nik,
                    type:'get',
                    success:function(data){
                        json = JSON.parse(data);
                        if (!json) {
                        $('.nama_karyawan').html('NIK Belum ada');
                            
                        } else {
                        $('.nama_karyawan').html(json.name);
                        $('#id_karyawan').val(json.id);
                        }
                    }
                })
            });

    </script>
@endsection
