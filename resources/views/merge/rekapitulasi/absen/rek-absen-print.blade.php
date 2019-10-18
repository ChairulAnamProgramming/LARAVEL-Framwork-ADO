<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print Laporan Rekapitulasi Absen</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            padding: 0 20px;
            text-align: center;
        }
        h1{
            text-align: center;
        }

    </style>
  </head>
  <body>

    <h1>Laporan Rekapitulasi Absen</h1>
    <br><br>

    <table class="" width="100%" border="1" cellspacing="0" style="margin:auto">
      <thead class="thead-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Nama Karyawan</th>
          <th scope="col">IN</th>
          <th scope="col">OUT</th>
          <th scope="col">IN Keterangan</th>
          <th scope="col">JK</th>
          <th scope="col">R</th>
          <th scope="col">JP</th>
          <th scope="col">Lembur</th>
          <th scope="col">1.5</th>
          <th scope="col">2</th>
          <th scope="col">3</th>
          <th scope="col">4</th>
          <th scope="col">Jam Lembur</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($merge as $item)


        @if ($item->in_keterangan ==null)
              @php
                  $keterangan = '';
              @endphp

        @elseif($item->in_keterangan ==1)
            @php
                $keterangan = 'Sakit';
            @endphp
        @elseif($item->in_keterangan ==2)
            @php
                $keterangan = 'Izin';
            @endphp
        @elseif($item->in_keterangan ==3)
            @php
                $keterangan = 'Skors';
            @endphp
        @elseif($item->in_keterangan ==4)
            @php
                $keterangan = 'Alpa';
            @endphp
        @endif




          @if ($item->status_onoff == 'OFF')
              <tr class="bg-warning text-white text-center">
                  <td> {{date('d-m-Y',strtotime($item->tanggal))}}</td>
                  <td></td>
                  <td> {{$item->in}} </td>
                  <td colspan="10"> OFF </td>
              </tr>

            @else

            <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> {{date('d-m-Y',strtotime($item->tanggal))}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->in}}</td>
                    <td>{{$item->out}}</td>
                    <td><h4>{{$keterangan}}</h4></td>
                    <td>{{$item->jam_kerja}}Jam</td>
                    <td>{{$item->r}}</td>
                    <td>{{$item->jam_pokok}}Jam</td>
                    <td>{{$item->lembur}}Jam</td>
                    <td>{{$item->n1_5}}</td>
                    <td>{{$item->n2}}</td>
                    <td>{{$item->n3}}</td>
                    <td>{{$item->n4}}</td>
                    <td>{{$item->jam_lembur}} Jam</td>
                </tr>


          @endif




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


<script type="text/javascript">
  window.print();
</script>
  </body>
</html>
