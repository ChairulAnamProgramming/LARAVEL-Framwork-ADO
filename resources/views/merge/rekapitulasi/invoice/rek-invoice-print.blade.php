<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print Laporan Rekapitulasi Invoice</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        h1{
            text-align: center;
        }

        .margin-center{
          display: flex;
          justify-content: center;
        }

        .font-weight-bold{
          font-weight: bold;
        }
    </style>
  </head>
  <body>


    <h1>Laporan Rekapitulasi Invoice</h1>
    <br><br>
                    <div class="margin-center" >
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


                        <table class="table" width="50%">
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


<script type="text/javascript">
  window.print();
</script>
  </body>
</html>
