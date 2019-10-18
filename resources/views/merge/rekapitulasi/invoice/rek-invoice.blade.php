@extends('templates.main')

@section('title','Rekapitulasi Invoice')


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
                                    <a href="{{url('/merge/print-invoice').'/'.$id_karyawan}}" class="btn btn-info btn-icon ">
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
                <div class="card-body">
                    @forelse ($merge as $item)

                    @php
                    $perjam =  15434;
                    $u_makan =  20000;
                    $tunjangan =  13333;
                    $skill =  20000;
                    $premi_ug =  30000;
                    @endphp

                    @php
                       // Tanggal Lahir
                        $tmk = $item->tmk;

                        // Convert Ke Date Time
                        $biday = date_create($tmk);
                        $today = date_create();

                        $diff = date_diff($biday,$today);
                        $month = $diff->y*12+$diff->m+$diff->d/30;
                    @endphp


                        @if ($month <= 3)
                            @php
                                $u_transp = 15000;
                            @endphp
                        @elseif($month >= 3 && $month <= 24)
                            @php
                                $u_transp = 20000;
                            @endphp
                        @elseif($month >= 24 && $month <= 48)
                            @php
                                $u_transp = 25000;
                            @endphp
                        @elseif($month >= 48)
                            @php
                                $u_transp = 27500;
                            @endphp
                        @endif


                    <table class="table">
                        <tr>
                            <td>Nama </td>
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
                            <td>TMK</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{date('d-M-Y',strtotime($item->tmk))}}</td>
                        </tr>
                        <tr>
                            <td>HK</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{$hari_keraja}}</td>
                        </tr>
                        <tr>
                            <td>Gaji Pokok</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($gajihP->gaji_pokok)}}</td>
                        </tr>
                        <tr>
                        @foreach ($total_jl as $total)

                        @php
                            $total_ul = $total->total_jl*$perjam;
                        @endphp

                            <td>Total Jam</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{$total->total_jl}}</td>
                        @endforeach
                        </tr>
                        <tr>
                            <td>Perjam</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($perjam)}}</td>
                        </tr>
                        <tr>
                            <td>Total UL</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($total_ul)}}</td>
                        </tr>

                        <tr>
                            <td>U.TRANSP</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($hari_keraja*$u_transp)}}</td>
                        </tr>
                        <tr>
                            <td>U.MKN</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($hari_keraja*$u_makan)}}</td>
                        </tr>
                        <tr>
                            <td>Tunjangan</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($hari_keraja*$tunjangan)}}</td>
                        </tr>
                        <tr>
                            <td>Skill</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($hari_keraja*$skill)}}</td>
                        </tr>
                        <tr>
                            <td>Premi UG</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($hari_keraja*$premi_ug)}}</td>
                        </tr>
                        <tr>
                            <td>Potongan Absen</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format(($gajihP->gaji_pokok/28)*$tidak_masuk)}}</td>
                        </tr>
                        <tr>
                            <td>Sub Total</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($gajihP->gaji_pokok+$total_ul+($hari_keraja*$u_transp)+($hari_keraja*$u_makan)+($hari_keraja*$tunjangan)+($hari_keraja*$skill)-(($gajihP->gaji_pokok/28)*$tidak_masuk))}}<td>
                        </tr>
                        <tr>
                            <td>Jamsostek</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format((11.89*$gajihP->gaji_pokok)/100)}}</td>
                        </tr>
                        <tr>
                            <td>THR</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($gajihP->gaji_pokok/12)}}</td>
                        </tr>
                        <tr>
                            <td>Biaya APD & Korling</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($gajihP->gaji_pokok/12)}}</td>
                        </tr>
                        <tr>
                            <td>Total Gaji</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($gajihP->gaji_pokok+$total_ul+($hari_keraja*$u_transp)+($hari_keraja*$u_makan)+($hari_keraja*$tunjangan)+($hari_keraja*$skill)-(($gajihP->gaji_pokok/28)*$tidak_masuk)+((11.89*$gajihP->gaji_pokok)/100)+($gajihP->gaji_pokok/12)+($gajihP->gaji_pokok/12))}}</td>
                        </tr>
                        <tr>
                            <td>MF</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format(12.5*$gajihP->gaji_pokok/100)}}</td>
                        </tr>
                        <tr>
                            <td>PPN</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format((12.5*$gajihP->gaji_pokok/100)*10/100)}}</td>
                        </tr>
                        <tr>
                            <td>pph 23</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format(-2*(12.5*$gajihP->gaji_pokok/100)/100)}}</td>
                        </tr>
                        <tr class="bg-warning text-white">
                            <td>Total Tagihan</td>
                            <td>:</td>
                            <td class="font-weight-bold">Rp.{{number_format($gajihP->gaji_pokok+$total_ul+($hari_keraja*$u_transp)+($hari_keraja*$u_makan)+($hari_keraja*$tunjangan)+($hari_keraja*$skill)-(($gajihP->gaji_pokok/28)*$tidak_masuk)+((11.89*$gajihP->gaji_pokok)/100)+($gajihP->gaji_pokok/12)+($gajihP->gaji_pokok/12)+(12.5*$gajihP->gaji_pokok/100)+((12.5*$gajihP->gaji_pokok/100)*10/100)+(-2*(12.5*$gajihP->gaji_pokok/100)/100))}}</td>
                        </tr>
                    </table>
                    @empty
                    @endforelse
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
