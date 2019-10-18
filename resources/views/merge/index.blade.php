@extends('templates.main')

@section('title','Rekapitulasi Merge & JC')


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
                                    <a href="{{url('/merge/create')}}" class="btn btn-neutral btn-icon ">
                                            <span class="btn-inner--icon">
                                                <i class="ni ni-fat-add"></i>
                                            </span>
                                            <span class="btn-inner--text">
                                                Tambahkan Absen baru
                                            </span>
                                        </a>
                                </div>
                            </div>

                    @endif
                </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush datatables">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Aksi</th>
                  <th scope="col">Nama Karyawan</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Bagian</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($merge as $item)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>
                            <a class="btn btn-sm btn-info" href=" {{url("merge/rek-jenis").'/'.$item->id}}">Detail</a>    
                          </td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->nik}}</td>
                          <td>{{$item->nama_bagian}}</td>
                      </tr>
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
