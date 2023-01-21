@extends('layouts.user')
@section('isi')


<style>
    @media only screen and(min-width:600px){
    .berita{
        height:300px
    }
}
@media only screen and(max-width:559px){
    .berita{
        height:150px
    }
}
</style>

	
<section class="blog" id="judul" style="background: green; padding-bottom:2%; ">
	<div class="container">
		<div class="row">
            <marquee behavior=""  direction=""><h3 style="color: white">Selamat Datang Di SMK Plus Ashabulyamin</h3></marquee>
            <div>
			<h1 style="color:white; display:inline-block">Daftar Berita </h1><h2 style="float:right" id="timestamp"></h2>
            </div>
		</div>
	</div>
</section>
	

	<section class="content" id="berita" style="background: white; padding:4%">
		<div class="container">

			<div class="row box" style="padding-right: 4%;padding-top: 4%; margin-top:1%">
                <div class="col-md-4 col-sm-12  " style="padding-right: 4%;padding-top: 4%; margin-top:2%">
                    <div class="row row1">
                    <div class="col-md-12" data-aos="fade-up" data-duration="3000" >
					<div class="widgets">
						<div class="widget">
							<form action="/berita" method="GET" >	
								@CSRF			
								<div class="input-group" style="padding-right: 4%">
									<input type="text" name="cari" class="form-control" placeholder="Search...">
									<span class="input-group-btn">
										<button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</form>
						</div>
						<div class="widget">
							<h2 class="widget-title">Categories</h2>
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
                    
						</div>	
					</div>
                    </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12" style="margin-top:2%; margin-left:1%; padding:2%;  " data-aos="flip-right">
                            <center><h3>MUSIK</h3>
                            <audio controls  autoplay>
                            <source src="/images/mars.mp3" type="audio/mpeg">
                            </audio>
                        </center>
                        </div>
                    </div>
			</div>
				
					@if(count($cari)!=0)
                    <div class="col-md-8 col-sm-12  m-2" style="padding:5%">
                    <div class="row">
                        <h3>Berita Terbaru</h3>
                    </div>
                  
                    @foreach ($cari as $berita )
                        
                        <div class="row mt-3">
                            <div class="col-md-4" data-aos="flip-left"><img style="min-height: 180px" src="/images/berita/{{ $berita->foto }}" alt="" width="100%" ></div>
                            <?php switch($berita->kategori){
                                case 1:
                                    $judul="Akademik";
                                break;
                                case 2:
                                    $judul="Bisnis";
                                break;
                                case 3:
                                    $judul="Pengetahuan";
                                break;
                                case 4:
                                    $judul="English Club";
                                break;
                                case 5:
                                    $judul="English Pramuka";
                                break;
                                case 6:
                                    $judul="English Osis";
                                break;
                                case 7:
                                    $judul="English OTKP";
                                break;
                                case 8:
                                    $judul="English TKJT";
                                break;
                                case 9:
                                    $judul="English BDP";
                                break;
                                case 10:
                                    $judul="English AKL";
                                break;
                                case 11:
                                    $judul="English GRF";
                                break;
                        
                            } ?>

                            <div class="col-md-8" style="margin-bottom: 5%;padding-left:15px" >
                                <div class="row">{{$berita->user->name}}</div>
                                <div class="row"><span style="background:rgba(100,255,100,0.8)">{{ $judul }}</span></div>
                                <div class="row"><h4>{{ $berita->judul}}</h4></div>
                                <div class="row" ><?php $data=explode(' ',$berita->created_at);
                                $data[0]=str_replace("/",'-',$data[0]);
                                $data[1]=substr($data[1],0,5);
                                echo $data[0].' '.$data[1].' Wib';
                                ?></div>
                                <div class="row">
                                    <a href="/berita/<?= str_replace(" ","-",$berita->judul) ?>" class="more-link">Continue reading <span
										class="meta-nav">&rarr;</span></a></p>
                                </div>
                              <hr>
                            </div>
                            
                        </div>
                    
                    
                    @endforeach
                    <div class="">{{ $cari->links() }}</div>
                    @else
                    <div class="col-md-8">
                        <h1 style="margin-top:35%; text-align:center">Data Kosong</h1>
                    </div> 
                    @endif                  
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