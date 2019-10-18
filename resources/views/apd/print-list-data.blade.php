<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan List Data APD</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Laporan List Data APD</h1>
        <table border="1" cellspacing="0" width="100%">
                <thead class="thead-light">
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Karyawan</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Tanggal Pinjam</th>
                      <th scope="col">Jumlah Pinjam</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($list_data as $item)
  
                      @php
                          $total_jumlah = $item->stok + $item->terima;
                      @endphp
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->nama_barang}}</td>
                          <td>{{date('d-m-Y',strtotime($item->tanggal))}}</td>
                          <td>{{$item->jumlah_pinjam}}</td>
                        </tr>
                    @empty
                      <tr class="text-center">
                          <td colspan="8">Kosong</td>      
                      </tr>                                        
                    @endforelse
                  
                </tbody>
              </table>

              <script>
                  window.print();
              </script>
</body>
</html>