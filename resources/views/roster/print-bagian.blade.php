<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Bagian Roster</title>
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
        <h1>Laporan Data Bagian Karyawan Roster Bulan {{date('m')}}</h1>
    </div>


    <table border="1" cellspacing="0" width="100%">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIK</th>
            <th scope="col">Bagian</th>
          </tr>
        </thead>
        <tbody style="text-align: center">
            @forelse ($roster as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->nik}}</td>
              <td>{{$item->nama_bagian}}</td>
            </tr>
            @empty
              <tr class="text-center">
                  <td colspan="4">Kosong</td>
              </tr>
            @endforelse

        </tbody>
      </table>


      <script>
          window.print()
      </script>
</body>
</html>
