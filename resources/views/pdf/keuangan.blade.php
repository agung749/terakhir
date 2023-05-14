<?php $pem=0?>
        @foreach ($pembayaran as $p)
        @php($pem+=1)
        @endforeach
<table align="center" border="2"   >
        <thead>
            <tr>
                <td align="center" colspan="{{ $pem+5 }}"> 
                     <b><h1>Data Keuangan Pendaftaran Siswa</h1></b>
                </td>
            </tr>
        </thead>
 <tbody>
    <tr>
        <td>No</td>
        <td>Nama</td>

        @foreach ($pembayaran as $p)
            <td>{{ $p->nama }}</td>
          
        @endforeach
        <td>Total Bayar</td>
        <td>
            Total Tunggakan
        </td>
        <td>Status</td>
    </tr>
    @php($i=1)
    @php($sum=0)
    @php($sum1=0)
    @php($jml_byr1=0)
    @php($jml_byr=0)
    <tr>
        <td>{{$i}}</td>
    <td>{{ $data[0]->siswa->nama }}</td>
   <?php  $siswa= $data[0]->id_siswa;?>
    @foreach ( $data as $d )
    @if($siswa != $d->id_siswa)
    @php($siswa = $d->id_siswa )
    @php($i+=1)
    
    <td><?php 
        $sum1+=$sum;
        echo $sum;
        $sum=0;
        ?></td>
    <tr>
    <td>{{$i}}</td>
    <td>{{ $d->siswa->nama }}</td>
    @endif
    @foreach ($pembayaran as $p)
    @if($d->jenis_pembayaran == $p->nama)
    <td>
       Rp.{{ number_format($d->total_bayar,2,',','.')}}
       <?php 
       $sum+=$d->total_bayar;
       $jml_byr+=$d->total_tunggakan;
       ?>
    </td>
    
    @endif
    @endforeach
    @endforeach
    <td><?php 
        echo number_format($sum,2,',','.');
        $sum1+=$sum;
        ?></td>
    </tr>
    <?php
    function penyebut($nilai) {
$nilai = abs($nilai);
$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
$temp = "";
if ($nilai < 12) {
$temp = " ". $huruf[$nilai];
} else if ($nilai <20) {
$temp = penyebut($nilai - 10). " belas";
} else if ($nilai < 100) {
$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
} else if ($nilai < 200) {
$temp = " seratus" . penyebut($nilai - 100);
} else if ($nilai < 1000) {
$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
} else if ($nilai < 2000) {
$temp = " seribu" . penyebut($nilai - 1000);
} else if ($nilai < 1000000) {
$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
} else if ($nilai < 1000000000) {
$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
} else if ($nilai < 1000000000000) {
$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
} else if ($nilai < 1000000000000000) {
$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
}     
return $temp;
}

function terbilang($nilai) {
if($nilai<0) {
$hasil = "minus ". trim(penyebut($nilai));
} else {
$hasil = trim(penyebut($nilai));
}     		
return $hasil;
}

    ?>
    <tr>
        <td colspan="2"><b><h2>TOTAL PEMASUKAN</h2></b></td>
        <td colspan="{{ $pem+3 }}"><b><h2>Rp. {{ number_format($sum1,2,',','.') }} ( {{ terbilang($sum1) }} Rupiah )</h2></b></td>
    </tr>
    <tr>
        <td colspan="2"><b><h2>TOTAL TOTAL TAGET PEMASUKAN</h2></b></td>
        <td colspan="{{ $pem+3 }}"><b><h2>Rp. {{ number_format($jml_byr1,2,',','.') }} ( {{ terbilang($jml_byr1) }} Rupiah )</h2></b></td>
    </tr>
    <tr>
        <td colspan="2"><b><h2>MINUS PEMASUKAN</h2></b></td>
        <td colspan="{{ ($pem+3) }}"><b><h2>Rp. {{ number_format($jml_byr1-$sum1,2,',','.') }} ( {{ terbilang($jml_byr1-$sum1) }} Rupiah )</h2></b></td>
    </tr>
 </tbody>
</table>
