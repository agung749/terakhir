 @extends('layouts.user')
 @section('isi')
@php($ditunggu=2)
 <section class="blog" id="judul" style="background: green; padding-bottom:2%; ">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <marquee behavior="" direction="right">Selamat Datang Di SMK Ashabulyamin</marquee>
				<h3 style="color:white" class="post-title">SPW BOS KU </h3>
                <h1  style="color:white; display:inline-block"class="post-title">Data Wirausaha Siswa<h1><h2 style="float:right" id="timestamp"></h2>
            </div>
		</div>
	</div>
</section>

@if($ditunggu==1)
<section class="content" id="berita" style="background: white; padding:4%">
	<div class="container">
<div class="row box col-md-12 col-xs-12 col-sm-12" style="padding-right: 4%;padding-top: 4%; margin-top:1%">
   			<canvas id="myChart" style="width:100%"></canvas>
 </div>
	</div>
</section>
	<section class="content" id="berita" style="background: white; padding:4%">
		<div class="container">
	<div class="row">
	<div class="box col-md-8 col-xs-12 col-sm-12 col-xl-8 " style="padding-right: 4%;padding-top: 2%; margin-left:2% ">
		<center><h3>Daftar Toko Wirausaha</h3></center>
	<?php $i=1?>
		@foreach($data as $datas)
		<div class="row">
			<div class="col-md-3">
				<img src="/images/toko/{{ $datas['foto'] }}"  width="100%"alt="">
			</div>
			<div class="col-md-7">
				<div class="col-12">
					<h4>{{ $datas['toko'] }}</h4>
				</div>
				<div class="col-12">
					<h5>{{ $datas['pemilik'] }}</h5>
				</div>
				<div class="col-12">
					<h5><b>{{ $datas['penghasilan'] }}</b></h5>
				</div>
			
			</div>
			<div class="col-md-2">
				<center><h4>Rank</h4>
				<h3>{{ $i++ }}</h3></center>
			</div>
		</div>
		@endforeach
	</div>
	<div class="box col-md-3 col-sm-12 col-xs-12 col-xl-3">
		<center><h3>Wirausaha Muda Ashabulyamin</h3></center>
	</div>
	</div>
	</div>

	</section>
	@else
	<section class="content" id="berita" style="background: white; padding:4%">
		<div class="container">
	<div class="row box col-md-12 col-xs-12 col-sm-12" style="padding-right: 4%;padding-top: 4%; margin-top:1%">
				<center>
					<img src="/images/santri.png" width="50%" style="margin-top:5%" alt="">
					<h1 style="margin-bottom:5%">Masih Dalam Pengerjaan</h1>
				</center>
	 </div>
		</div>
	</section>
	@endif

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('script')
<script>
	const ctx = document.getElementById('myChart');
	var xValues = ['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
var yValues = [<?= $penghasilan[0]?>,<?= $penghasilan[1]?>,<?= $penghasilan[2]?>,<?= $penghasilan[3]?>,<?= $penghasilan[4]?>,<?= $penghasilan[5]?>,<?= $penghasilan[6]?>,<?= $penghasilan[7]?>,<?= $penghasilan[8]?>,<?= $penghasilan[9]?>,<?= $penghasilan[10]?>,<?= $penghasilan[11]?>];
new Chart(ctx, {
	type: "line",
  data: {
    labels: xValues,
    datasets: [{
		label : "Omzet Siswa",
      backgroundColor: "rgba(0,0,0,1.0)",
      borderColor: "rgba(0,0,0,0.1)",
      data: yValues
    }]
  },
  options:{}
});
  </script>
@endsection