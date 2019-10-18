@extends('templates.main')

@section('title','Data Karyawan')


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
                                    <a href="{{url('/karyawan/create')}}" class="btn btn-neutral btn-icon ">
                                            <span class="btn-inner--icon">
                                                <i class="ni ni-fat-add"></i>
                                            </span>
                                            <span class="btn-inner--text">
                                                Tambahkan Karyawan baru
                                            </span>
                                        </a>
                                </div>
                            </div>

                            <div class="row">
                                @if (Auth::user()->role == 'User')

                                @else
                                <div class="col-12 col-sm-4 mt-2">
                                    <a href="{{url('/karyawan/print')}}" class="btn btn-info btn-icon ">
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
                  <th scope="col">Nama Karyawan</th>
                  <th scope="col">NIK</th>
                  <th scope="col">TMK</th>
                  <th scope="col">KTP</th>
                  <th scope="col">Bagian</th>
                  <th scope="col">TTL</th>
                  <th scope="col">Alamat</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($karyawan as $item)
                    <tr>
                        <td>{{$loop->iteration}} </td>
                        @if (Auth::user()->role == 'User')
                        @else
                        <td class="text-right">
                            <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <button type="button" class="dropdown-item tombol-hapus" data-toggle="modal" data-target="#modal-form" data-identitas="{{url('/karyawan').'/'.$item->id}}">Hapus</button>
                                <a class="dropdown-item" href=" {{url("/karyawan/$item->id/edit")}}">Ubah</a>
                            </div>
                            </div>
                        </td>
                        @endif
                        <td> {{$item->name}} </td>
                        <td> {{$item->nik}} </td>
                        <td> {{date('d-M-Y',strtotime($item->tmk))}} </td>
                        <td> {{$item->ktp}} </td>
                        <td> {{$item->nama_bagian}} </td>
                        <td> {{$item->tmpt_lhr .' ' . $item->tgl_lhr}} </td>
                        <td> {{$item->alamat}} </td>
                    </tr>
                @endforeach

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
