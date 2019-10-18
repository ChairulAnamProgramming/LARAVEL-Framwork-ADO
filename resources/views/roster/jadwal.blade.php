@extends('templates.main')

@section('title','Jadwal Roster Karyawan')


@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div class="alert-status"></div>

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-sm-9">
                            <a href="{{url('/roster')}}" class="btn btn-neutral btn-icon ">
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
                            <a href="{{url('/roster/jadwal').'/'.$id_karyawan}}" class="btn btn-info btn-icon ">
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
            <table class="table align-items-center table-flush datatables table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  @if (Auth::user()->role == 'User')
                  @else
                  <th scope="col">Aksi</th>
                  @endif
                  <th scope="col">Tanggal</th>
                  <th scope="col">Nama</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($rosterku as $item)
                  

                      <tr>
                        <td>{{$loop->iteration}}</td>
                        @if (Auth::user()->role == 'User')
                        @else
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <button type="button" class="dropdown-item tombol-ubah" data-toggle="modal" data-target="#modal-form" data-identitas="{{$item->tanggal}}" data-url="{{url('roster').'/'.$item->id_roster}}">Ubah tanggal</button>
                                </div>
                            </div>
                        </td>
                        @endif
                        <td> <span class="date-animation">{{date('d-m-Y',strtotime($item->tanggal))}}</span></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->nik}}</td>
                        
                        @if ($item->in == 'OFF')
                        <td class="text-center"><div class="btn btn-danger btn-sm @if(Auth::user()->role == 'User') @else btn-status @endif"  data-status="off" data-id_roster="{{$item->id_roster}}">OFF</div></td>
                        @else
                        <td class="text-center"><div class="btn btn-success btn-sm @if(Auth::user()->role == 'User') @else btn-status @endif" data-status="on" data-id_roster="{{$item->id_roster}}">ON</div></td>
                        @endif
                      </tr>
                  @endforeach
              </tbody>
            </table>
            
          </div>
          
        </div>
      </div>
    </div> 



    <div class="row">
        <div class="col">
            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <form action="#" method="POST" class="form-ubah">
                        @method('patch')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-body">
                                <h1>Ubah tanggal </h1>
                                <div id="input-tanggal"></div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button> 
                                <button class="btn btn-primary  ml-auto">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    


@endsection

@section('script')
{{-- 
<script>
$('.tombol-ubah').on('click',function(e){
    e.preventDefault();
    const url = $(this).data('url');
    console.log(url);
    const identitas = $(this).data('identitas');
    $('#input-tanggal').html(`<input type="date" name="tanggal" class="form-control form-control-alternative" value="`+identitas+`">`)
    $('.form-ubah').attr('action',url);
});

$('.btn-status').on('click',function(){
    const status = $(this).data('status');
    const id_roster = $(this).data('id_roster');
    $.ajax({
        url:"{{url('/roster').'/'.'status/'}}"+id_roster,
        data:{
            status:status
        },
        success:function(){
            location.reload();
            $('.alert-status').html('<div class="alert alert-success">Status berhasil di perbaharui</div>')
        }
    })
})

</script> --}}
@endsection