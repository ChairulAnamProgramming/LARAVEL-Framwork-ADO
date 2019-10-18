<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Laporan Surat Kontrak</title>
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
        <h1>Laporan Perpanjangan Surat Kontrak</h1>
    </div>


    <table border="1" cellspacing="0" width="100%">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Tanggal di buat</th>
                <th scope="col">Jenis Surat</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            @forelse ($perpanjang_kontrak as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->no_surat}}</td>
                    <td>{{date('d-m-Y',strtotime($item->tanggal))}}</td>
                    <td>{{$item->jenis_surat}}</td>
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
