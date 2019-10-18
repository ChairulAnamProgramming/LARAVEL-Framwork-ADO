@extends('templates.main')

@section('title','List Data APD')


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
                        <div class="row">
                            <div class="col-12 col-sm-12 mt-2">
                            <a href="{{url('/apd')}}" class="btn btn-primary btn-icon ">
                                <span class="btn-inner--icon">
                                    <i class="ni ni-bold-left"></i>
                                </span>
                                <span class="btn-inner--text">
                                    Kembali
                                </span>
                            </a>
                            @if (Auth::user()->role == 'User')
                            @else
                                <a href="{{url('/apd/print_list_data')}}" class="btn btn-info btn-icon ">
                                    <span class="btn-inner--icon">
                                        <i class="ni ni-laptop"></i>
                                    </span>
                                    <span class="btn-inner--text">
                                        Print
                                    </span>
                                </a>
                            @endif
                            
                            </div>
                        </div>
                        
            
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush datatables">
              <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Jumlah Pinjam</th>
                    @if (Auth::user()->role == 'User')
                    @else
                        <th scope="col">Aksi</th>
                    @endif
                </tr>
              </thead>
              <tbody>
                  @forelse ($list_data as $item)

                    @php
                        $total_jumlah = $item->stok + $item->terima;
                    @endphp
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->nama_barang}}</td>
                        <td>{{date('d-m-Y',strtotime($item->tanggal))}}</td>
                        <td>{{$item->jumlah_pinjam}}</td>
                        @if (Auth::user()->role == 'User')
                        @else
                        <td>
                            <button type="button" class="btn btn-sm btn-danger tombol-hapus" data-toggle="modal" data-target="#modal-form" data-identitas="{{url('/apd').'/'.$item->id_apd}}">Hapus</button>
                        </td>
                        @endif
                      </tr>
                  @empty
                    <tr class="text-center">
                        <td colspan="8">Kosong</td>      
                    </tr>                                        
                  @endforelse
                
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