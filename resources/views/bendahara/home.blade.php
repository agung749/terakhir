@extends('adminlte::page')
@section('content')
<style>
    body{
    margin-top:20px;
    background:#FAFAFA;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container wapper p-5">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Uang Masuk</h6>
                    <h2 class="text-right"><i class="fa fa-users f-left"></i><span></span></h2>
                    <p class="m-b-0"></span></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Uang Keluar</h6>
                    <h2 class="text-right"><i class="fa fa-arrow-down f-left"></i><span></span></h2>
                    <p class="m-b-0"></span></p>

                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Gaji Staff</h6>
                    <h2 class="text-right"><i class="fa fa-newspaper-o f-left"></i><span></span></h2>
                    <p class="m-b-0"></span></p>
               
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Tunggakan Siswa</h6>
                    <h2 class="text-right"><i class="fa fa-comments-o f-left"></i><span></span></h2>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
        </div>
	</div>

<canvas id="badCanvas1" width="400" height="150"></canvas>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const ctx = document.getElementById('badCanvas1');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Pemasukan Siswa', 'Pemasukan BOS', 'Pemasukan Sumbangan', 'Pemasukan Lainya','Gaji Staff', 'Pengeluaran Bulanan','Pembayaran Lainya'],
    datasets: [{
      label: 'Saran',
      data: [ ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>


@endsection