<?php $home=1?>
@extends('layouts.user')
@section('isi')
<style>
	body{
		display: flex;
		flex-direction: column;
		justify-content: center;
		vertical-align: middle;
		overflow-x: hidden;
	}
 #success_tic .page-body{
  max-width:300px;
  background-color:#FFFFFF;
  margin:10% auto;
}
 #success_tic .page-body .head{
  text-align:center;
}
/* #success_tic .tic{
  font-size:186px;
} */
#success_tic .close{
      opacity: 1;
    position: absolute;
    right: 0px;
    font-size: 30px;
    padding: 3px 15px;
  margin-bottom: 10px;
}
#success_tic .checkmark-circle {
  width: 150px;
  height: 150px;
  position: relative;
  display: inline-block;
  vertical-align: top;
}
.checkmark-circle .background {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background: #1ab394;
  position: absolute;
}
#success_tic .checkmark-circle .checkmark {
  border-radius: 5px;
}
#success_tic .checkmark-circle .checkmark.draw:after {
  -webkit-animation-delay: 300ms;
  -moz-animation-delay: 300ms;
  animation-delay: 300ms;
  -webkit-animation-duration: 1s;
  -moz-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-timing-function: ease;
  -moz-animation-timing-function: ease;
  animation-timing-function: ease;
  -webkit-animation-name: checkmark;
  -moz-animation-name: checkmark;
  animation-name: checkmark;
  -webkit-transform: scaleX(-1) rotate(135deg);
  -moz-transform: scaleX(-1) rotate(135deg);
  -ms-transform: scaleX(-1) rotate(135deg);
  -o-transform: scaleX(-1) rotate(135deg);
  transform: scaleX(-1) rotate(135deg);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
#success_tic .checkmark-circle .checkmark:after {
  opacity: 1;
  height: 75px;
  width: 37.5px;
  -webkit-transform-origin: left top;
  -moz-transform-origin: left top;
  -ms-transform-origin: left top;
  -o-transform-origin: left top;
  transform-origin: left top;
  border-right: 15px solid #fff;
  border-top: 15px solid #fff;
  border-radius: 2.5px !important;
  content: '';
  left: 35px;
  top: 80px;
  position: absolute;
}

@-webkit-keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}
@-moz-keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}
@keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }

}
@media only screen and (min-width:601px)
{
	.img-responsive{
		height:200px;
		padding:4%;
		height:100%;
	}
	.frame{
	width:516px;
	height: 400px;
	}	
	.program{
		padding-left:14%;
		margin-top:3%;
	}
	.portfolio-item{
		height: 300px;
	}
	.program > div{
		height:270px;
	}
	.program > div > img{
		height:150px;
	}
}
</style>
<a class="btn btn-circle btn-md  wa" href="https://wa.me/+62{{ $sekolah->no_hp }}" style=" position:fixed; background:rgba(100,255,100,0.6); bottom:20px; right:20px;">
	<i class="fa fa-phone " style="color: white; font-size:30px"></i>
</a>
<section class="home" id="home" data-stellar-background-ratio="0.4">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="st-home-unit">
						<div class="hero-txt">
                            <p class="hero-work"> Best Islamic Vocational School </p>
							<h2 class="hero-title" id="juduls">SMK PLUS ASHABULYAMIN </h2>
							
							<!-- <p class="hero-sub-title">We Provide Hight Quality Bootstrap Template</p> -->
							<!-- <a href="#" class="btn btn-default btn-lg left-btn">Info Now</a> -->
							<a href="/pendaftaran" class="btn btn-main btn-lg">Ayo Daftar</a>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="mouse-icon">
			<div class="wheel"></div>
		</div>
</section>
	
	<section class="about" id="about" >
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title st-center"  data-aos="fade-right" 
					data-aos-duration="1000">
						<h3>SMK PLUS ASHABULYAMIN</h3>
						<p style="color:limegreen">SMK Berbasis Pesantren Cianjur</p>
					</div>
					<div class="row mb90"  data-aos="fade-right" 
					data-aos-duration="1000">
						<div class="col-md-6">	
                                <h4>Profile</h4>
								<?=  $sekolah->deskripsi?>
                       	 </div>
                       
						<div class="col-md-6"  data-aos="fade-right" 
						data-aos-duration="1000">
						<iframe class="frame"  src="{{ $sekolah->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 5%">
			<div class="col-md-6">
			<img src="/images/siswa1.png" width="100%" data-aos="fade-in" data-aos-duration="3000" alt="">
		</div>
		<div class="col-md-6" style="text-shadow: 5px 5px 5px 5px grey">
			<h1>KAMI ADA UNTUK MEMBANGUN NEGERI</h1>
			<h3>Maju Bersama SMK Plus Ashabulyamin</h3>
		</div>		
	</div>
	</div>
	</section>
	<section class="about " id="about" >
		<div class="container">
			<div class="row ">
				<div class="col-md-12">
					<div class="section-title st-center"  data-aos="fade-right" 
					data-aos-duration="1000">
						<h3>SMK PLUS ASHABULYAMIN</h3>
						<p style="color:limegreen">SMK Berbasis Pesantren Cianjur</p>
					</div>
				
					<div class="row program p-5 text-center d-flex flex-row" >
						<div class="col-md-3  col-sm-3  col-xs-3 col-xl-3 col-lg-3box mr-3" style="margin-right: 2%;padding: 3%;" data-aos="flip-right" data-aos-duration="3000">
							<img src="/images/Shalat-Jamaah.jpg"width="100%" alt="" class="program-photo">
							<h3>Shalat Duha Bersama</h3>
							
						</div>
						<div class="col-md-3  col-sm-3  col-xs-3 col-xl-3 col-lg-3mr-5 box" style="margin-right: 2%;padding: 3%" data-aos="flip-right" data-aos-duration="3700">
							<img src="/images/ngaji.jpg"width="100%" alt="" class="program-photo">
							<h3>Hafal Juzh 30</h3>
							<br>
						</div>
						<div class="col-md-3  col-sm-3  col-xs-3 col-xl-3 col-lg-3box" style="padding: 3%"  data-aos="flip-right" data-aos-duration="4000">
							<img src="/images/berdoa_169.jpeg"width="100%" alt="" class="program-photo">
							<h3>Shalat Dzuhur Ashar Bersama</h3>
						</div>
					</div>
					<div class="row program p-5 text-center d-flex flex-row" >
						<div class="col-md-3  col-sm-3  col-xs-3 col-xl-3 col-lg-3box mr-3" data-aos="flip-right" data-aos-duration="3000"style="margin-right: 2%;padding: 3%;">
							<img src="/images/bisnisman.png"  width="100%" alt="" class="program-photo">
							<h3>Everyone Is Bussinessman</h3>
							
						</div>
						<div class="col-md-3  col-sm-3  col-xs-3 col-xl-3 col-lg-3mr-5 box" data-aos="flip-right" data-aos-duration="3700" style="margin-right: 2%;padding: 3%">
							<img src="/images/ngaji.jpg"  width="100%" alt="" class="program-photo">
							<h3>Hafal Juzh 30</h3>
							<br>
						</div>
						<div class="col-md-3  col-sm-3  col-xs-3 col-xl-3 col-lg-3box" data-aos="flip-right" data-aos-duration="4000" style="padding: 3%">
							<img src="/images/berdoa_169.jpeg"  width="100%" alt="" class="program-photo">
							<h3>Shalat Dzuhur Ashar Bersama</h3>
						</div>
					</div>
				</div>

			</div>
			<div class="row" style="margin-bottom: 5%">
			<div class="col-md-6">
			<img src="/images/siswa1.png" width="100%" data-aos="fade-in" data-aos-duration="3000" alt="">
		</div>
		<div class="col-md-6" style="text-shadow: 5px 5px 5px 5px grey">
			<h1>KAMI ADA UNTUK MEMBANGUN NEGERI</h1>
			<h3>Maju Bersama SMK Plus Ashabulyamin</h3>
		</div>		
	</div>
	</div>
	</section>
	<section class="funfacts" data-stellar-background-ratio="0.4">
		<div class="container">
            <div class="row">
                <h1 style="color:white; text-align:center;">Daftar Profile Kami</h1>
            </div>
			<div class="row">
				<div class="col-md-3">
					<div class="funfact">
						<div class="st-funfact-icon"><i class="fa fa-chalk"></i></div>
						<div class="st-funfact-counter"><span class="st-ff-count" data-from="0" data-to="37"
								data-runit="1">0</span></div>
						<strong class="funfact-title">Dewan Guru</strong>
					</div><!-- .funfact -->
				</div>
				<div class="col-md-3">
					<div class="funfact">
						<div class="st-funfact-icon"><i class="fa fa-building"></i></div>
						<div class="st-funfact-counter"><span class="st-ff-count" data-from="0" data-to="25"
								data-runit="1">0</span></div>
						<strong class="funfact-title">Kelas</strong>
					</div><!-- .funfact -->
				</div>
				<div class="col-md-3">
					<div class="funfact">
						<div class="st-funfact-icon"><i class="fa fa-send"></i></div>
						<div class="st-funfact-counter"><span class="st-ff-count" data-from="0" data-to="700"
								data-runit="1">0</span></div>
						<strong class="funfact-title">Murid</strong>
					</div><!-- .funfact -->
				</div>
				<div class="col-md-3">
					<div class="funfact">
						<div class="st-funfact-icon"><i class="fa fa-magic"></i></div>
						<div class="st-funfact-counter"><span class="st-ff-count" data-from="0" data-to="200"
								data-runit="1">0</span></div>
						<strong class="funfact-title">Prestasi</strong>
					</div><!-- .funfact -->
				</div>
			</div>
		</div>
	</section>

	<section class="service" id="service">
		<div class="container box ">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title st-center">
						<h3>Apasi Kelebihan Kami?</h3>
						<p>Kelebihan Kami</p>
					</div>
					<div class="row">
						<div class="col-md-3  ">
							<div class="st-feature">
								<div class="st-feature-icon"><i class="fa fa-like"></i></div>
								<strong class="st-feature-title">Agamis</strong>
								<p>Selalu melaksanakan pengajaran berdasarkan al-quran dan al-hadist</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="st-feature">
								<div class="st-feature-icon"><i class="fa fa-desktop"></i></div>
								<strong class="st-feature-title">Up to date</strong>
								<p>Mengimplementasikan kurikulum yang sesuai dengan perkembangan jaman sesuai arahan kemeridkti</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="st-feature">
								<div class="st-feature-icon"><i class="fa fa-arrow-down"></i></div>
								<strong class="st-feature-title">Biaya terjangkau</strong>
								<p>SPP yang relatif lebih murah dan selalu ada beasiswa bagi siswa yang kurang mampu ataupun berprestasi</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="st-feature">
								<div class="st-feature-icon"><i class="fa fa-building"></i></div>
								<strong class="st-feature-title">Fasilitas Lengkap</strong>
								<p>Memiliki laboratorium , mesjid serta lapangan olahraga sendiri serta ruangan untuk kegiatan eskul dan uks</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="portfolio" id="galery">
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-12 no-padding ">
					<div class="section-title st-center">
						<h3>Gallery Foto</h3>
						<p>Kegiatan Kami </p>
					</div>
					<div class="filter mb40">
						<form id="filter">
							<fieldset class="group">
								<label class="btn btn-default btn-main"><input type="radio" name="filter" value="all"
										checked="checked">Semua</label>
								<label class="btn btn-default"><input type="radio" name="filter" value="Prestasi">Prestasi</label>
								<label class="btn btn-default"><input type="radio" name="filter" value="Fasilitas">Fasilitas</label>
								<label class="btn btn-default"><input type="radio" name="filter" value="Eskul">Eskul</label>
								<label class="btn btn-default"><input type="radio" name="filter" value="Kegiatan">Kegiatan</label>
							</fieldset>
						</form><!-- #filter -->
					</div><!-- .filter .mb40 -->

					<div class="grid">
						@foreach($fotos as $foto)
						<figure class="portfolio-item" data-groups='["{{ $foto->kategori }}"]'>
							<img src="images/gallery/{{ $foto->foto }}" alt="" width="100%"/>
							<figcaption>
									<h2>{{ $foto->nama }}</h2>
									<p>
										<?= $foto->deskripsi ?>
									</p>									
							</figcaption>
						</figure>
						@endforeach
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="pricing" id="kompetensi">
		<div class="container">
			<div class="row" data-aos="fade-up" data-aos-duration="2000">
				<div class="col-md-12">
					<div class="section-title st-center">
						<h3>DAFTAR</h3>
						<p>KOMPETENSI KAMI</p>
					</div>
				</div>
			</div>
			<div class="row" style="align-items: center">
				<div class="col-md-1 col-xs-1 col-sm-1 "></div>
				<div class="col-md-2" data-aos="flip-left" data-aos-duration="2000">
					<div class="pricing-table">
						<div class="pricing-header">
							<center><H4>AKUNTANSI KEUANGAN LEMBAGA</H4>
							<img src="/images/accountant.png" width="100%" alt="">
							</center>
							<div class="pt-name">AKL</div>
						</div>
				
						<div class="pricing-footer">
							<a href="#" class="btn btn-default">Info</a>
						</div>
					</div>
				</div>
				<div class="col-md-2" data-aos="flip-left" data-aos-duration="2500">
					<div class="pricing-table">
						<div class="pricing-header">
							<center><H4>Otomatisasi Tata Kelola Perkantoran</H4>
								<img src="/images/otkp.png" width="100%" alt="">
								</center>
							<div class="pt-name">OTKP</div>
						</div>
					
						<div class="pricing-footer">
							<a href="#" class="btn btn-default">Info</a>
						</div>
					</div>
				</div>
				<div class="col-md-2" data-aos="flip-left" data-aos-duration="3000">
					<div class="pricing-table ">
						<div class="pricing-header">
							<center><H5>Teknik Komputer Jaringan dan Telekomuniasi</H5>
								<img src="/images/tkj.png" width="100%" alt="">
								</center>
								<div class="pt-name">TJKT</div>
						</div>
					
						<div class="pricing-footer">
							<a href="#" class="btn btn-default">Info</a>
						</div>
					</div>
				</div>
				<div class="col-md-2" data-aos="flip-left" data-aos-duration="3500">
					<div class="pricing-table">
						<div class="pricing-header">
							<center><H4>Bisnis Daring dan Pemasaran</H4>
								<img src="/images/bdp.jpg" width="100%" alt="">
								<br>	<br>	<br>
								</center>
								<div class="pt-name">BDP</div>
						</div>
					
						<div class="pricing-footer">
							<a href="#" class="btn btn-default">Info</a>
						</div>
					</div>
				</div>
				<div class="col-md-2" data-aos="flip-left" data-aos-duration="4000">
					<div class="pricing-table">
						<div class="pricing-header">
							<center><H4>Desain Komunikasi<br>Visual</H4>
								<img src="/images/design-graphic.png" width="100%" alt="">
								</center>
								<div class="pt-name">DKV</div>
						
							</div>
						<div class="pricing-footer">
							<a href="#" class="btn btn-default">Info</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="blog" id="berita">
		<div class="container">
			<div class="row" data-aos="fade-up" data-aos-duration="2000">
				<div class="col-md-12">
					<div class="section-title st-center">
						<h3>Berita Kami</h3>
						<p>Berita Terbaru</p>
					</div>
				</div>
			</div>
			<div class="row">
				@php($i=0)
				
				@foreach($beritas as $berita)
				@php($i++)
				<div class="col-md-7 box p-5" data-aos="flip-left" data-aos-duration="3000" style="margin-right: 6%; margin-bottom:3%">
					<div class="blog-post p-5">
						<div class="post-meta">
							
							<span class="author"><a href="#"><img src="photos/author.jpg" alt=""> {{ $berita->user->name}}</a></span>,
						
							<span>on <strong>{{ $berita->created_at }}</strong></span>
						</div>
						<h2 class="post-title"><a href="/berita/{{ $berita->id }}">{{ $berita->judul }}</a></h2>
						<div class="post-thumb" ><a href="#"><img src="/images/berita/{{ $berita->foto }}" alt="" style="height:300px" class="img-responsive" ></a>
						</div>
						<div class="post-content">
							<p style="display: inline-block; white-space: nowrap; overflow:hidden; text-overflow:ellipsis; ">
								<?=  $berita->isi ?>
								<a href="/berita/<?= str_replace(" ","-",$berita->judul) ?>" class="more-link">Continue reading <span
										class="meta-nav">&rarr;</span></a></p>
						</div>
					</div>
			
				</div>
				
				@if($i==1)
				
				<div class="col-md-4 box" data-aos="flip-right">
					<div class="widgets" style="margin-top: 10%">
						<div class="widget">
							<form action="" class="">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search...">
									<span class="input-group-btn">
										<button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</form>
						</div>
						<div class="widget" style="padding-right:6%">
							<h2 class="widget-title">Categories</h2>
							<ul>
								<li><a href="/berita/kategori/1">Akademik <span class="badge pull-right">{{ $kategori[0] }}</span></a></li>
								<li><a href="/berita/kategori/2">Bisnis <span class="badge pull-right">{{ $kategori[1] }}</span></a></li>
								<li><a href="/berita/kategori/3">Pengetahuan<span class="badge pull-right">{{ $kategori[2] }}</span></a></li>
								<li><a href="/berita/kategori/4">English Club<span class="badge pull-right">{{ $kategori[3] }}</span></a></li>
								<li><a href="/berita/kategori/5">Pramuka<span class="badge pull-right">{{ $kategori[4] }}</span></a></li>
								<li><a href="/berita/kategori/6">OSIS<span class="badge pull-right">{{ $kategori[5] }}</span></a></li>
								<li><a href="/berita/kategori/7">OTKP<span class="badge pull-right">{{ $kategori[6] }}</span></a></li>
								<li><a href="/berita/kategori/8">BDP<span class="badge pull-right">{{ $kategori[7] }}</span></a></li>
								<li><a href="/berita/kategori/9">TKJT<span class="badge pull-right">{{ $kategori[8] }}</span></a></li>
								<li><a href="/berita/kategori/10">AKL<span class="badge pull-right">{{ $kategori[9] }}</span></a></li>
						   
							</ul>
						</div>
				
						
					</div>
				</div>
				@else
				<div class="col-md-4 box " style="padding:2%" data-aos="flip-right">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h2 style="float:left; color:black" id="timestamp"></h2>
					</div>
					<div id='calendar' class="col-md-12 col-sm-12 col-xs-12"></div>
				</div>
				<div class="col-md-4 box " style="margin-top:2%; padding:2%;  " data-aos="flip-right">
					<center><h3>MUSIK</h3>
					<audio controls  autoplay>
					<source src="/images/mars.mp3" type="audio/mpeg">
					</audio>
				</center>
				</div>
				@endif
				@endforeach
				
			</div>
		</div>
	</section>
	
	</section>
	<section class="subscribe">
		<div class="container">
			<div class="row">
				<div class="col-md-12" data-aos="zoom-in" data-aos-duration="1000">
					<h3 class="subscribe-title">Subscribe Newsletter</h3>
					<form role="form" class="subscribe-form">
						<div class="input-group">
							<input type="email" class="form-control" id="mc-email" placeholder="Enter E-mail...">
							<span class="input-group-btn">
								<button class="btn btn-main btn-lg" type="submit">Subscribe!</button>
							</span>
						</div>
					</form>
					<div class="subscribe-result"></div>
					<p class="subscribe-or">or</p>
					<ul class="subscribe-social">
						<li data-aos="fade-left" data-aos-duration="2000"><a href="{{ $sekolah->instagram }}" class="social " style="background: #dd8888" ><i class="fa fa-instagram" style="background: #dd6668"></i> Follow</a></li>
						<li data-aos="fade-left" data-aos-duration="3000"><a href="{{ $sekolah->fb }}" class="social facebook"><i class="fa fa-facebook"></i> Like</a></li>
						<li data-aos="fade-left" data-aos-duration="2000"><a href="#" class="social" style="background: #88dd88"><i class="fa fa-phone" style="background: #66dd66"></i>whatsapp</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	@if(\Session::has('success'))
	<div id="success_tic" class="modal fade" role="dialog">
		<div class="modal-dialog">
	  
		  <!-- Modal content-->
		  <div class="modal-content">
			<a class="close" href="#" data-dismiss="modal">&times;</a>
			<div class="page-body">
		  <div class="head">  
			<h3 style="margin-top:5px;">Pesan</h3>
			<h4>Saran Berhasil Dikirim</h4>
		  </div>
	  
		<h1 style="text-align:center;"><div class="checkmark-circle">
		<div class="background"></div>
		<div class="checkmark draw"></div>
	  </div><h1>
	  
		</div>
	  </div>
		  </div>
	  
		</div>
	@endif
	<section class="contact" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title st-center">
						<h3>Contact Us</h3>
						<p>Get in Touch with Us</p>
					</div>
				</div>
			</div>
			<div class="row " >
				<div class="col-md-6 box " data-aos="fade-right" style="padding:7%" data-aos-duration="3000">
					<form  action="/saran" method="POST" >
					@csrf
						<input type="text" class="form-control" id="name" name="nama" placeholder="Your Full Name">
						<input type="email" class="form-control" id="email" name="email" placeholder="Your E-mail">
						<select name="kategori" id="kategori" class="form-control " style="margin-bottom: 5%" >
						<option value="fasilitas">Fasilitas</option>
						<option value="Guru">Guru</option>
						<option value="Keuangan">Keuangan</option>
						</select>
						<textarea id="mssg" name="saran" placeholder="Your Message" class="form-control" rows="10"></textarea>
						<button class="btn btn-main btn-lg" type="submit" id="send"><i class="fa fa-paper-plane "></i>
							Kirim</button>
					</form>
					<div id="result-message" role="alert"></div>
				</div>
				<div class="col-md-6">
					<img src="/images/siswalaki.png" data-aos="fade-left" data-aos-duration="4500" width="70%" alt="">
				</div>
			</div>
		</div>
	</section>
	<section >
		<div class="container" data-aos="fade-up" data-aos-duration="3000">
			<div class="row">
				<div class="col-md-12">
				
						<h1>Lokasi Kami</h1>
						<h3>Jl. K.H. Saleh No.57A, Sayang, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat</h3>
						<h3>0263267740</h3>
				</div>
			</div>
		
	</section>
	@endsection
	@section('script')
	<script>
		AOS.init();
	  </script>
    <script>
        $(document).ready(function(){
			$('.modal').modal('show');
			$('.wa').mouseover(function(){
			
				$(this).html('<i class="fa fa-phone " style="color: white; font-size:30px"></i> &nbsp; Whatsapp').animate({
					opacity:1,
					'width':'150px'
				},2000);
			})
			$('.wa').mouseleave(function(){
							
				$(this).html('<i class="fa fa-phone " style="color: white; font-size:30px"></i>').animate({
					opacity:1,
					'width':'100px'
				},2000);
		
			})
            $('.bagian2').hide();
            $('.bagian3').hide();
            $('.bagian5').hide();
            $('.bagian6').hide();
            $('.bagian7').hide();
            $('.bagian4').hide();
            $('.klik1').attr('disabled','true');
            a=0;
            $('.klik2').click(function(){
                a+=1;
                if(a==1){
                $('.bagian2').show();
                $('.bagian1').hide();
                }
             else if(a==2){
                $('.bagian3').show();
                $('.bagian2').hide();
                }
            else if(a==3){
                $('.bagian4').show();
                $('.bagian3').hide();
                }
                else if(a==4){
                $('.bagian5').show();
                $('.bagian4').hide();
                }
                else if(a==6){
                $('.bagian6').show();
                $('.bagian5').hide();
                }
                else if(a==7){
                $('.bagian7').show();
                $('.bagian6').hide();
                }
            });
          
        })
    </script>

@endsection
