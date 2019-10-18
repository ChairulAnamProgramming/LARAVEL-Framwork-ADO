<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karyawan Print</title>
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
        <h1>Laporan Data Karyawan Bulan {{date('m')}}</h1>
    </div>


    <table border="1" cellspacing="0" width="100%">
        <thead class="thead-light">
          <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Karyawan</th>
              <th scope="col">NIK</th>
              <th scope="col">TMK</th>
              <th scope="col">KTP</th>
              <th scope="col">Bagian</th>
              <th scope="col">TTL</th>
              <th scope="col">Alamat</th>
          </tr>
        </thead>
        <tbody style="text-align: center">
            @forelse ($karyawan as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->nik}}</td>
                  <td>{{$item->tmk}}</td>
                  <td>{{$item->ktp}}</td>
                  <td>{{$item->nama_bagian}}</td>
                  <td>{{$item->tmpt_lhr .' ' . $item->tgl_lhr}}</td>
                  <td>{{$item->alamat}}</td>
                </tr>
            @empty
              <tr class="text-center">
                  <td colspan="8">Kosong</td>
              </tr>
            @endforelse

        </tbody>
      </table>


      <script>
          window.print()
      </script>
</body>
</html>
