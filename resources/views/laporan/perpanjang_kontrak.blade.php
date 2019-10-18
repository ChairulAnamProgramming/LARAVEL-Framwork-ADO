@extends('templates.main')

@section('title','Data Laporan Surat Perpanjang Kontrak')


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
                    Data Surat Perpanjang Kontrak MMI & JC   
                    <div class="row">
                        @if (Auth::user()->role == 'User')

                        @else
                        <div class="col-12 col-sm-4 mt-2">
                            <a href="{{url('/laporan/print')}}" class="btn btn-info btn-icon ">
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
                </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush datatables">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Tanggal di buat</th>
                            <th scope="col">Jenis Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perpanjang_kontrak as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->no_surat}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->tanggal))}}</td>
                                    <td>{{$item->jenis_surat}}</td>
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