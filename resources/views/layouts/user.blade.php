<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMK PLUS ASHABULYAMIN</title>
	<link rel="icon" href="/images/logo" type="image/png">
	<meta name="keywords" content="SMK PLUS ASHABULYAMIN">
	<meta name="description" content="SMK PLUS ASHABULYAMIN adalah sekolah berbasikan agama namun tetap up to date dalam dunia Informatika . Menciptakan lulusan-lulusan unggul dalam dunia IT">
	<link
		href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,400italic,600,300italic,300|Oswald:400,300,700'
		rel='stylesheet' type='text/css'>
	<!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/font-awesome.min.css" rel="stylesheet">

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link href="/css/owl.carousel.css" rel="stylesheet">
	<link href="/css/owl.theme.css" rel="stylesheet">
	<link href="/css/owl.transitions.css" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link href='js/main.css' rel='stylesheet' />
    <script src='js/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>

    <script>
        // fungsi initialize untuk mempersiapkan peta
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-6.8266726,107.1477404),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<link href="/css/style.css" rel="stylesheet">




	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="/js/html5shiv.min.js"></script>
		<script src="/js/respond.min.js"></script>
		<![endif]-->
</head>

<body data-spy="scroll" data-target=".main-nav">
	<style>
	.judul > h1{
		color:white;		
	}
	
		#timestamp{
			color:white;

		}
		.post-thumb{
			text-align: center;
		}
	
		@media only screen and (max-width:600px){
		
		
		.box{
    border-radius: 14px;
background: #ffffff;
box-shadow:  20px 20px 40px #cec7cf,
             -20px -20px 60px #ffffff;
}
		.card-4 {
			padding: 2%;
			
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
		.content{
			min-height: 700px;
			padding-top: 15%;
			background:#fefe
			font-size: 14px;
		}
		tr{
			margin: 10px
		}
		.img-thumb{
			
			height:100px;
		}
		.rekom{
			margin-bottom:1%; 
			border-bottom:0.5px solid black;
		}
	}
	@media only screen and (min-width:601px){
		.content{
			min-height: 700px;
			padding-top: 5%;
			background:#fefe
			font-size: 14px;
		}
		.img-thumb{
			
			height:200px;
		}
		.box{
    border-radius: 14px;
background: #ffffff;
box-shadow:  20px 20px 40px #cec7cf,
             -20px -20px 60px #ffffff;
}
		.row1{
			margin-top: 10%;
		}
		.card-4 {
		
			height: 250px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
	
		.tulisan{
			font-size: 13px;
		}
		
	
	}

	</style>
	<header class="st-navbar">
		<nav class="navbar navbar-default navbar-fixed-top clearfix" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sept-main-nav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="/images/logo.png" width="200px" height="150px" class="img-responsive"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse main-nav" id="sept-main-nav">
					<ul class="nav navbar-nav navbar-right">
						<li class="i"><a href="/#home"> Beranda</a></li>
                        <li><a href="/pendaftaran">Pendaftaran</a></li>
						<li><a href="/berkas-data">berkas</a></li>
						<li><a href="/berita">Berita</a></li>
						<li><a href="/spw">SPW Bos Ku</a></li>
						<li><a href="/staff">Data Staff</a></li>
						<li><a href="/login">Login</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</header>
    @yield('isi')
    <footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					&copy; <a href="https://www.cantothemes.com">CantoThemes</a> 2015.
					<!-- Don't Remove/Edit this. If you remove this you don't have permission to use this template. -->
					Designed by <a href="https://www.cantothemes.com">CantoThemes</a>
					<!-- So Please don't remove this -->
				</div>
				<div class="col-md-12">
					Distributed by <a href="https://themewagon.com/">Themewagon</a>

				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/js/jquery.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.easing.min.js"></script>
	<script src="/js/jquery.stellar.js"></script>
	<script src="/js/jquery.appear.js"></script>
	<script src="/js/jquery.nicescroll.min.js"></script>
	<script src="/js/jquery.countTo.js"></script>
	<script src="/js/jquery.shuffle.modernizr.js"></script>
	<script src="/js/jquery.shuffle.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="/js/owl.carousel.js"></script>
	<script src="/js/jquery.ajaxchimp.min.js"></script>
	<script>
		// Function ini dijalankan ketika Halaman ini dibuka pada browser
		$(function(){
		setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
		});
		 
		//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
		function timestamp() {
		$.ajax({
		url: '/jam',
		success: function(data) {
		$('#timestamp').html(data);
		},
		});
		}
		</script>
	<script src="/js/script.js"></script>
    @yield('script')
</body>

</html>