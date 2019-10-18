@extends('templates.main')

@section('title','Rekapitulasi Absen')


@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    @if (Auth::user()->role == 'User')
                        @else
                        <div class="row">
                                <div class="col-sm-9">
                                    <a href="{{url('/merge')}}" class="btn btn-neutral btn-icon ">
                                        <span class="btn-inner--icon">
                                            <i class="ni ni-bold-left"></i>
                                        </span>
                                        <span class="btn-inner--text">
                                            Kembali
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                @if (Auth::user()->role == 'User')

                                @else
                                <div class="col-12 col-sm-4 mt-2">
                                    <a href="{{url('/merge/print-absen').'/'.$id_karyawan}}" class="btn btn-info btn-icon ">
                                        <span class="btn-inner--icon">
                                            <i class="ni ni-laptop"></i>
                                        </span>
                                        <span class="btn-inner--text">
                                            Print
                                        </span>
                                    </a>
                                </div>
                                @endif
                            </div>
                    @endif

                    <div class="row">
                            <div class="col-12 mt-2">
                                    <table class="">
                                        <tr>
                                            <td>IJIN/ALPA</td>
                                            <td>:</td>
                                            <td  class="font-weight-bold">LIBUR : {{$libur}} | SAKIT : {{$sakit}} | IZIN : {{  $izin}} | SKORS: {{$skors}} | ALPA : {{  $alpa}}</td>
                                        </tr>
                                        <tr>
                                            <td>HK efektif</td>
                                            <td>:</td>
                                            <td  class="font-weight-bold">31Hr</td>
                                        </tr>
                                        <tr>
                                            <td>Total jam lembur</td>
                                            <td>:</td>
                                            @foreach ($total_jl as $total)
                                            <td class="font-weight-bold">{{$total->total_jl}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Hari Kerja</td>
                                            <td>:</td>
                                            <td  class="font-weight-bold">{{$hari_keraja}}</td>
                                        </tr>
                                    </table>
                            </div>
                    </div>
                </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush datatables">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  @if (Auth::user()->role == 'User')
                  @else
                  <th scope="col">Aksi</th>
                  @endif
                  <th scope="col">Tanggal</th>
                  <th scope="col">Nama Karyawan</th>
                  <th scope="col">IN</th>
                  <th scope="col">OUT</th>
                  <th scope="col">IN Keterangan</th>
                  <th scope="col">JK</th>
                  <th scope="col">R</th>
                  <th scope="col">JP</th>
                  <th scope="col">Lembur</th>
                  <th scope="col">1.5</th>
                  <th scope="col">2</th>
                  <th scope="col">3</th>
                  <th scope="col">4</th>
                  <th scope="col">Jam Lembur</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($merge as $item)


                @if ($item->in_keterangan ==null)
                      @php
                          $keterangan = '';
                      @endphp

                @elseif($item->in_keterangan ==1)
                    @php
                        $keterangan = 'Sakit';
                    @endphp
                @elseif($item->in_keterangan ==2)
                    @php
                        $keterangan = 'Izin';
                    @endphp
                @elseif($item->in_keterangan ==3)
                    @php
                        $keterangan = 'Skors';
                    @endphp
                @elseif($item->in_keterangan ==4)
                    @php
                        $keterangan = 'Alpa';
                    @endphp
                @endif




                  @if ($item->status_onoff == 'OFF')
                      <tr class="bg-warning text-white text-center">

                          @if (Auth::user()->role == 'User')
                            @else
                            <td></td>
                            <td class="text-right">
                                <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <button type="button" class="dropdown-item tombol-hapus" data-toggle="modal" data-target="#modal-form" data-identitas="{{url('/merge').'/'.$item->id_merge}}">Hapus</button>
                                    <a class="dropdown-item" href=" {{url("/merge/$item->id_merge/edit")}}">Ubah</a>
                                </div>
                                </div>
                            </td>
                            @endif
                            <td> {{date('d-m-Y',strtotime($item->tanggal))}}</td>
                          <td></td>
                          <td> {{$item->in}} </td>
                          <td colspan="10"> OFF </td>
                      </tr>

                    @else


                    @if ($item->in == 7)
                    <tr  class="bg-info text-white">
                            <td>{{$loop->iteration}}</td>
                            @if (Auth::user()->role == 'User')
                            @else
                            <td class="text-right">
                                <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <button type="button" class="dropdown-item tombol-hapus" data-toggle="modal" data-target="#modal-form" data-identitas="{{url('/merge').'/'.$item->id_merge}}">Hapus</button>
                                    <a class="dropdown-item" href=" {{url("/merge/$item->id_merge/edit")}}">Ubah</a>
                                </div>
                                </div>
                            </td>
                            @endif
                            <td> {{date('d-m-Y',strtotime($item->tanggal))}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->in}}</td>
                            <td>{{$item->out}}</td>
                            <td>{{$keterangan}}</td>
                            <td>{{$item->jam_kerja}}Jam</td>
                            <td>{{$item->r}}</td>
                            <td>{{$item->jam_pokok}}Jam</td>
                            <td>{{$item->lembur}}Jam</td>
                            <td>{{$item->n1_5}}</td>
                            <td>{{$item->n2}}</td>
                            <td>{{$item->n3}}</td>
                            <td>{{$item->n4}}</td>
                            <td>{{$item->jam_lembur}} Jam</td>
                        </tr>

                        @else
                        <tr>
                                <td>{{$loop->iteration}}</td>
                                @if (Auth::user()->role == 'User')
                                @else
                                <td class="text-right">
                                    <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <button type="button" class="dropdown-item tombol-hapus" data-toggle="modal" data-target="#modal-form" data-identitas="{{url('/merge').'/'.$item->id_merge}}">Hapus</button>
                                        <a class="dropdown-item" href=" {{url("/merge/$item->id_merge/edit")}}">Ubah</a>
                                    </div>
                                    </div>
                                </td>
                                @endif
                                <td> {{date('d-m-Y',strtotime($item->tanggal))}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->in}}</td>
                                <td>{{$item->out}}</td>
                                <td><h4>{{$keterangan}}</h4></td>
                                <td>{{$item->jam_kerja}}Jam</td>
                                <td>{{$item->r}}</td>
                                <td>{{$item->jam_pokok}}Jam</td>
                                <td>{{$item->lembur}}Jam</td>
                                <td>{{$item->n1_5}}</td>
                                <td>{{$item->n2}}</td>
                                <td>{{$item->n3}}</td>
                                <td>{{$item->n4}}</td>
                                <td>{{$item->jam_lembur}} Jam</td>
                            </tr>
                    @endif


                  @endif




                  @empty
                      <tr class="text-center">
                          <td colspan="12">Kosong</td>
                      </tr>
                  @endforelse
                <tr>
                    <td></td>
                </tr>
              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>



    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <form action="#" method="POST" class="form-hapus">
                        @method('delete')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-body">
                                <h1>Apakah anda yakin?</h1>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                <button class="btn btn-primary  ml-auto">Iya</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection

@section('script')

<script>
$('.tombol-hapus').on('click',function(e){
    e.preventDefault();
    const identitas = $(this).data('identitas');
    $('.form-hapus').attr('action',identitas)
    console.log(identitas);
});

</script>
@endsection
