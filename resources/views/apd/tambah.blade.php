@extends('templates.main')

@section('title','Tambah APD')


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
                                  <h3 class="mb-0">Tambah APD</h3>
                                </div>
                                <div class="col-4 text-right">
                                  {{-- <a href="#" class="btn btn-sm btn-info">Settings</a> --}}
                                </div>
                              </div>
                            </div>
                            <div class="card-body">
                          <form action="{{url('/apd')}}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="pl-lg-12">
                                  <div class="row">
                                    <div class="col-lg-12">
                                          <div class="form-group focused">
                                              <div class="input-group mb-3">
                                                  <select  name="id_barang" id="id_barang" class="custom-select form-control-alternative">
                                                          <option value="">Pilih Barang</option>
                                                          @forelse ($barang as $item)
                                                              <option value="{{$item->id_barang}}">{{$item->nama_barang}} ({{$item->stok}})</option>
                                                              
                                                          @empty
                                                              <option value="">Kosong</option>
                                                          @endforelse
                                                  </select>
                                                  <div class="input-group-append">
                                                      <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#modal-form"><i class="ni ni-fat-add"></i></button>
                                                  </div>
                                              </div>
                                              @if ($errors->has('id_barang'))
                                              <small class="text-danger">
                                                      <strong>{{ $errors->first('id_barang') }}</strong>
                                              </small>
                                              @endif
                                          </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                          <div class="form-group">
                                                  <select  name="status" id="status" class="custom-select form-control-alternative">
                                                          <option value="">Pilih Status</option>
                                                          <option value="pengeluaran">Pengeluaran</option>
                                                          <option value="penerimaan">Penerimaan</option>
                                                  </select>
                                          </div>
                                    </div>
                                  </div>
                                  <div class="status-pengeluaran d-none">
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <div class="form-group">
                                                      <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control form-control-alternative" placeholder="nama_karyawan" readonly><br>
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
                                          <div class="col-lg-12">
                                              <div class="form-group">
                                                      <input type="number" id="jumlah_pinjam" name="jumlah_pinjam" class="form-control form-control-alternative" placeholder="Jumlah Pinjam Barang"><br>
                                                      @if ($errors->has('jumlah_pinjam'))
                                                      <small class="text-danger">
                                                              <strong>{{ $errors->first('jumlah_pinjam') }}</strong>
                                                      </small>
                                                      @endif
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>

                                  <div class="status-penerimaan d-none">
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <div class="form-group">
                                                      <input type="text" id="jumlah_terima" name="jumlah_terima" class="form-control form-control-alternative" placeholder="Jumlah Barang Terima">
                                                      @if ($errors->has('jumlah_terima'))
                                                      <small class="text-danger">
                                                              <strong>{{ $errors->first('jumlah_terima') }}</strong>
                                                      </small>
                                                      @endif
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                          <input type="date" id="tanggal" name="tanggal" class="form-control form-control-alternative" placeholder="tanggal" value="{{date('Y-m-d')}}"><br>
                                                  @if ($errors->has('tanggal'))
                                                  <small class="text-danger">
                                                          <strong>{{ $errors->first('tanggal') }}</strong>
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





<div class="row">
    <div class="col-md-4">
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary shadow border-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-4">
                                        <small>Tambah Barang Baru</small>
                                    </div>
                                    <form role="form" action="{{url('/barang')}}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-vector"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Enter Barang" type="text" name="nama_barang">
                                            </div>
                                            @if ($errors->has('nama_barang'))
                                                  <small class="text-danger">
                                                          <strong>{{ $errors->first('nama_barang') }}</strong>
                                                  </small>
                                            @endif
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-vector"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Stok Awal" type="number" name="stok" value="100">
                                            </div>
                                            @if ($errors->has('stok'))
                                                  <small class="text-danger">
                                                          <strong>{{ $errors->first('stok') }}</strong>
                                                  </small>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary my-4">Tambah Barang</button>
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

            $('#status').on('change',function(){
                $('.status-pengeluaran').addClass('d-none');
                $('.status-penerimaan').addClass('d-none');
              const val_status = $(this).val()
              console.log(val_status);

              if (val_status == 'pengeluaran') {
                $('.status-pengeluaran').removeClass('d-none');
                $('#jumlah_terima').val('');

              } else {
                $('.status-penerimaan').removeClass('d-none');
                $('#id_karyawan').val('');
                $('#jumlah_pinjam').val('');
              }



            });

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
                        $('#znama_karyawan').html('NIK Belum ada');
                            
                        } else {
                        $('#nama_karyawan').val(json.name);
                        $('#id_karyawan').val(json.id);
                        }
                    }
                })
            });

    </script>
@endsection
