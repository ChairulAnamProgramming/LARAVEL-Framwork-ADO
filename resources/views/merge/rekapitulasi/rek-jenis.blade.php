@extends('templates.main')

@section('title','Jenis Rekapitulasi')


@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif



    <div class="row justify-content-center">
        @if (Auth::user()->role != "User")
            <div class="col-sm-3">
                <a href="{{url('merge/rek-invoice').'/'.$id_karyawan}}">
                    <div class="card card-bagian">
                        <div class="card-header bg-success text-center">
                            <h4 class="text-white">Rekapitulasi Invoice</h4>
                        </div>
                        <div class="card-body text-success text-center">
                            <i class="ni ni-atom ni-4x"></i>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        <div class="col-sm-3">
            <a href="{{url('merge/rek-absen').'/'.$id_karyawan}}">
                <div class="card card-bagian">
                    <div class="card-header bg-success text-center">
                        <h4 class="text-white">Rekapitulasi Absen</h4>
                    </div>
                    <div class="card-body text-success text-center">
                        <i class="ni ni-bullet-list-67 ni-4x"></i>
                    </div>
                </div>
            </a>
        </div>
        {{-- <div class="col-sm-3">
            <a href="{{url('merge/rek-gajih').'/'.$id_karyawan}}">
                <div class="card">
                    <div class="card-header bg-success text-center">
                        <h4 class="text-white">Rekapitulasi Gajih</h4>
                    </div>
                    <div class="card-body text-success text-center">
                        <i class="ni ni-collection ni-4x"></i>
                    </div>
                </div>
            </a>
        </div> --}}
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
