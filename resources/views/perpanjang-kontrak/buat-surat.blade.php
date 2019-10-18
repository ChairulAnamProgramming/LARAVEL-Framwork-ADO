@extends('templates.main')

@section('title','Perpanjang Kontrak')


@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-6 col-sm-3 mt-1">
            <a href="{{url('perpanjang_kontrak/mmi')}}">
                <div class="card text-center py-4 card-bagian" style="height:100%;">
                    <i class="ni  ni-collection  text-red ni-3x mb-2"></i>
                <h5>MMI</h5>
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-3 mt-1">
            <a href="{{url('perpanjang_kontrak/jc')}}">
                <div class="card text-center py-4 card-bagian" style="height:100%;">
                    <i class="ni  ni-ungroup  text-blue ni-3x mb-2"></i>
                <h5>JC</h5>
                </div>
            </a>
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