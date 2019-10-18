<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Jadwal Roster Karyawan</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>

    <div>
        <h1>Laporan Data Jadwal Roster Karyawan  Bulan {{date('m')}}</h1>
    </div>


    <table border="1" cellspacing="0" width="100%">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Status</th>
              </tr>
        </thead>
        <tbody style="text-align: center">
            @forelse ($rosterku as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><span class="date-animation">{{date('d-m-Y',strtotime($item->tanggal))}}</span></td>
                <td>{{$item->name}}</td>
                <td>{{$item->nik}}</td>
                <td>{{$item->in}}</td>
              </tr>
            @empty
              <tr class="text-center">
                  <td colspan="5">Kosong</td>
              </tr>
            @endforelse

        </tbody>
      </table>


      <script>
          window.print()
      </script>
</body>
</html>
