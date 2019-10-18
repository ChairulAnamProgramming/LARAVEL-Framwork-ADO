@extends('templates.main')

@section('title','Rekapitulasi Gajih')


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

                            {{-- <div class="row">
                                @if (Auth::user()->role == 'User')

                                @else
                                <div class="col-12 col-sm-4 mt-2">
                                    <a href="{{url('/merge/print')}}" class="btn btn-info btn-icon ">
                                        <span class="btn-inner--icon">
                                            <i class="ni ni-laptop"></i>
                                        </span>
                                        <span class="btn-inner--text">
                                            Print
                                        </span>
                                    </a>
                                </div>
                                @endif
                            </div> --}}
                    @endif
                </div>
                <div class="card-body">
                    @foreach ($merge as $item)
                    @php
                        $gajih_pokok = 2670000;
                        $tunjangan =  13333;
                    @endphp
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="font-weight-bold">{{$item->name}}</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td class="font-weight-bold">{{$item->nik}}</td>
                            </tr>
                            <tr>
                                <td>Bagian</td>
                                <td>:</td>
                                <td class="font-weight-bold">{{$item->nama_bagian}}</td>
                            </tr>
                            <tr>
                                <td>Hari Kerja</td>
                                <td>:</td>
                                <td class="font-weight-bold">{{$hari_keraja}}</td>
                            </tr>
                            <tr>
                                <td>Gajih Pokok</td>
                                <td>:</td>
                                <td class="font-weight-bold">Rp.{{number_format($gajih_pokok)}}</td>
                            </tr>
                            @if ()
                                
                            @endif
                            <tr>
                                <td>Tunjangan</td>
                                <td>:</td>
                                <td class="font-weight-bold">{{($item->nama_bagian)}}</td>
                            </tr>
                        </table>
                    @endforeach
                </div>

        </div>
      </div>
    </div>






@endsection

@section('script')

<script>

</script>
@endsection
