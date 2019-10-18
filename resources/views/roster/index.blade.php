@extends('templates.main')

@section('title','Data Karyawan')


@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

   @if (Auth::user()->role == 'User')
       
   @else
   <div class="row mb-2">
        <div class="col-sm-9">
            <a href="{{url('/roster/create')}}" class="btn btn-neutral btn-icon ">
                    <span class="btn-inner--icon">
                        <i class="ni ni-fat-add"></i>
                    </span>
                    <span class="btn-inner--text">
                        Tambah Jadwal Roster
                    </span>
                </a>
        </div>
    </div>
   @endif
    <div class="row">


        @forelse ($bagian as $item)
        <div class="col-6 col-sm-3 mt-1">
            <a href="{{url('/roster/bagian').'/'.$item->id_bagian}}">
                <div class="card text-center py-4 card-bagian" style="height:100%;">
                    <i class="ni @if(!$item->icon) ni-umbrella-13 @else {{$item->icon}} @endif text-info ni-3x mb-2"></i>
                <h5>{{$item->nama_bagian}}</h5>
                </div>
            </a>
            </div>
        
        @empty
            
        @endforelse


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