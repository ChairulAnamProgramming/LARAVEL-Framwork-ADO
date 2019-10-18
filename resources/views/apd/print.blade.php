<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APD Print</title>
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
        <h1>Laporan APD Bulan {{date('m')}}</h1>
    </div>


    <table border="1" cellspacing="0" width="100%">
        <thead class="thead-light">
          <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Stok</th>
              <th scope="col">Tanggal Terima</th>
              <th scope="col">Jumlah Terima</th>
              <th scope="col">Total Jumlah</th>
              <th scope="col">Pengeluaran APD</th>
              <th scope="col">Stok Barang</th>
          </tr>
        </thead>
        <tbody style="text-align: center">
            @forelse ($apd as $item)

              @php
                  $total_jumlah = $item->stok + $item->terima;
              @endphp
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->nama_barang}}</td>
                  <td>{{$item->stok}}</td>
                  <td>{{$item->tanggal}}</td>
                  <td>{{$item->terima}}</td>
                  <td>{{$total_jumlah}}</td>
                  <td>{{$item->pinjam}}</td>
                  <td>{{$total_jumlah -  $item->pinjam}}</td>
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