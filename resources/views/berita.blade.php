@extends('layouts.user')
@section('isi')




	
<section class="blog" id="judul" style="background: green; padding-bottom:2%; ">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<marquee ><h4 style="color:white">Selamat Datang Di SMK Plus Ashabulyamin</h4></marquee>
				<h3 style="color:white" class="post-title">Judul</h3>
				<div>
					<h1  style="color:white; display:inline-block"class="post-title"><a style="color:white; "href="/berita/{{ $berita->id }}">{{ $berita->judul }}</a></h1><h2 style="float:right" id="timestamp"></h2>
				</div>
			</div>
		</div>
	</div>
</section>
	

	<section class="blog" id="berita" style="background: white; padding-top:2%">
		<div class="container">

			<div class="row">
				
				<div class="col-md-8">
					<div class="blog-post">
						<div class="post-meta">
							
							<span class="author"><a href="#"><img  src="photos/author.jpg" alt=""> {{ $berita->user->name}}</a></span>,						
							<span>on <strong>{{ $berita->created_at }}</strong></span>
						</div>
						<div class="post-thumb"><a href="#"><img class="img-gambar" src="/images/berita/{{ $berita->foto }}" alt="" width="100%"></a>
						</div>
						<div class="post-content">
							<p >
								<?=  $berita->isi ?>
							</p>
							@if($berita->video!="")
							<h4>Dokumentasi</h4>
							<video controls width="80%" src="/videos/berita/{{ $berita->video }}"></video>
							@endif
						</div>
						<div style="float: right; margin-bottom:2%">
							<a href="/berita/like/<?= str_replace(" ","-",$berita->judul)?>"><button class="btn btn-md btn-primary"><i class="fa fa-thumbs-up"></i> Suka {{ $berita->suka }}</button></a>
								<a href="/berita/dislike/<?= str_replace(" ","-",$berita->judul)?>"><button class="btn btn-md btn-danger"><i class="fa fa-thumbs-down"></i>Tidak Suka {{ $berita->tidak_suka }}</button></a>
						</div>
						<form action="/komentar/<?= str_replace(" ","-",$berita->judul)?>" method="post">
							@csrf
						<div class="komentar">
							Nama
							<input type="text" name="nama" class="form-control" id="">
							komentar
							<textarea name="komentar" id="komentar" class="form-control" cols="30" rows="5"></textarea>
						<button  type="submit" class="btn btn-success btn-md " style="margin-top:3%">Kirim</button>
						</div>
					</form>
					</div>
			
				</div>
		
				<div class="col-md-4 col-sm-12" style="padding-bottom: 3%">
					<div class="widgets">
						<div class="widget">
							<form action="/berita" method="GET" >	
								@CSRF			
								<div class="input-group">
									<input type="text"  name="cari" class="form-control" placeholder="Search...">
									<span class="input-group-btn">
										<button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</form>
						</div>
						<div class="widget">
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
								<li><a href="/berita/kategori/11">GRF<span class="badge pull-right">{{ $kategori[10] }}</span></a></li>

							</ul>
						</div>	
					</div>
				</div>
		
			</div>
			<div class="baca" style="height:200px;  overflow-y:scroll">
			
				@if(count($berita->komentar)!=0)	
					@foreach ($berita->komentar as $komentar)
						<div>
							<h4>{{ $komentar->nama }}</h4>
							<p>{{ $komentar->komentar }}</br>{{ $komentar->created_at }}</p>
						</div>
					@endforeach
					@else
					<h3>Komentar Kosong</h3>
				@endif
		</hr>
			
		</div>
		</div>
	</section>
<section class="rekomen" style="padding-top: 0%; text-align:center">
@php($i=0)
<div class="container" style="padding:2%">
<h2>Rekomendasi Berita</h2>
<div class="row">
@foreach ( $rekomen as $rekomens )
@php($i++)
	<div class="col-md-3 col-sm-12 col-xs-12 rekom" style="background: #fefefe; margin-right:4%;">
		<div class="row">
		<div class="col-md-12 col-xs-4 col-sm-4"><img  class="img-thumb" style="display: inline-block" width="100%" src="/images/berita/{{ $rekomens->foto }}"  alt=""></div>	
		<div class="col-md-12 col-xs-7 col-sm-7 ">
		<div class="col-md-12 col-xs-12 col-sm-12"><h4 class="tulisan"><a href="/berita/{{ $berita->id }}">{{ $berita->judul }}</a></h4></div>
		<div class="col-md-12 col-xs-12 col-sm-12"><h5><i class="fa fa-user"></i>&nbsp;{{ $berita->user->name}}</h5></div>
		<div class="col-md-12 col-xs-12 col-sm-12">	<h5> <i class="fa fa-calendar"></i>&nbsp;{{ $rekomens->created_at }}</h5></div>
		</div>
	</div>
</div>
@if($i==3)
<div class="container">
</div>
<div class="row">
@endif
@endforeach
</div>
</section>
@endsection
	@section('script')
	<script>
		AOS.init();
	  </script>
    <script>
        $(document).ready(function(){
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