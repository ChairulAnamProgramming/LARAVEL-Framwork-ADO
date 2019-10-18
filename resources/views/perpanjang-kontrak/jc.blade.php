<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpanjang Kontrak MMI</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            padding: 80px;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <td>No</td>
            <td>:</td>
            <td>{{$no_surat}}/KKN/{{date('Y')}}</td>
        </tr>
        <tr>
            <td>HAL</td>
            <td>:</td>
            <td>PERPANJANGAN KONTRAK KARYAWAN</td>
        </tr>
    </table>

    <table style="margin-top:20px;">
        <tr>
            <td>Kepada Yth.</td>
        </tr>
        <tr>
            <td>Bapak Pimpinan</td>
        </tr>
        <tr>
            <td>PT. MERGE MINING INDUSTRI</td>
        </tr>
        <tr>
            <td>Up. Jin Chen</td>
        </tr>
    </table>

    <table style="margin-top:30px;">
        <tr>
            <td>Dengan hormat</td>
        </tr>
    </table>
    <table style="margin-top:10px;">
        <tr>
            <td>Sehubungan dengan akan berakhirnya kontrak kerja karyawan PT. KARTIKA KARYA NUSANTARA pada tanggal {{date('d m Y',strtotime($tanggal))}}, maka kami dari manajemen PT. KARTIKA KARYA NUSANTARA mengajukan perpanjangan kontrak kerja karyawan kami di bagian dan atas nama  sebagai berikut :</td>
        </tr>
    </table>

    <table style="margin-top:20px;text-align:center;" border="1" cellspacing="0" width="100%">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>TMK</th>
            <th>BAGIAN</th>
            <th>ALAMAT</th>
        </tr>
        @forelse ($karyawan_jc as $item)
        <tr>
            <td>1</td>
            <td>{{$item->name}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->tmk}}</td>
            <td style="background-color:#ccc">{{$item->nama_bagian}}</td>
            <td>{{$item->alamat}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Kosong</td>
        </tr>
        @endforelse
        
    </table>


    <p>Besar harapan kami agar seluruh karyawan kami dapat diperpanjang kontraknya. Apabila ada karyawan kami yang tidak diperpanjang kontraknya kami mohon ada penjelasan ataupun alasannya kenapa kayawan tersebut tidak diperpanjang kontraknya.</p>
    <p>Demikian surat ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>


    <table style="margin-left:auto;text-align:center;margin-top:20px;" width="40%">
        <tr>
            <td>Rantau bakula, {{date('d m Y',strtotime($tanggal))}}</td>
        </tr>
        <tr style="height:50px;">
            <td></td>
        </tr>
        <tr>
            <td>Bambang S</td>
        </tr>
        <tr>
            <td>Korlap PT. KARTIKA KARYA NUSANTARA</td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>