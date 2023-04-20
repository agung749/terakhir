@extends('layouts.user')
@section('isi')




	
<section class="blog" id="judul" style="background: green; padding-bottom:2%; ">
	<div class="container">
		<div class="row">
            <marquee behavior="" direction="right"><h4>Selamat Datang Di SMK Plus Ashabulyamin</h4></marquee>
            <h3 style="color:white" class="post-title">Judul</h3>
            <div>
                <h1  style="color:white; display:inline-block"class="post-title">Daftar Staff</h1><h2 style="float:right" id="timestamp"></h2>
            </div>
		</div>
	</div>
</section>
	

	<section class="content" id="staff" style="background: white; padding-top:2%">
		<div class="container box" style="margin-top:2% ; padding:5%">

			<div class="row ">
				
                <div class="col-md-4 col-sm-12" style="padding-bottom: 3%">
					<div class="widgets">
						<div class="widget">
							<form action="/staff" method="GET" >	
								@CSRF			
								<div class="input-group">
									<input type="text" name="cari" class="form-control" placeholder="Search...">
									<span class="input-group-btn">
										<button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</form>
						</div>
						<div class="widget">
							<h2 class="widget-title">Categories</h2>
                            <li><a href="/staff/kategori/Guru">Guru<span class="badge pull-right">{{ $kategori[0] }}</span></a></li>
                            <li><a href="/staff/kategori/TU">TU <span class="badge pull-right">{{ $kategori[1] }}</span></a></li>
                            <li><a href="/staff/kategori/Struktural">Struktural<span class="badge pull-right">{{ $kategori[2] }}</span></a></li>
                            <li><a href="/staff/kategori/Caraka">Caraka<span class="badge pull-right">{{ $kategori[3] }}</span></a></li>
                        </div>	
                        
					</div>
                  <div class="row">
                    <div class="col-md-12">
                        <h4>Kritik Dan Saran</h4>
                    <form  action="/saran" method="POST" >
					@csrf
						<input type="text" class="form-control" id="name" name="nama" placeholder="Your Full Name" style="margin-bottom: 3%" >
						<input type="email" class="form-control" id="email" name="email" placeholder="Your E-mail" style="margin-bottom: 3%" >
						<select name="kategori" id="kategori" class="form-control " style="margin-bottom: 3%" >
						<option value="fasilitas">Fasilitas</option>0
						<option value="Guru">Guru</option>
						<option value="Keuangan">Keuangan</option>
						</select>
						<textarea id="mssg" name="saran" placeholder="Your Message" class="form-control" rows="4"></textarea>
						<button class="btn btn-main btn-xs" type="submit" id="send"><i class="fa fa-paper-plane "></i>
							Kirim</button>
					</form>
					<div id="result-message" role="alert"></div>
                    </div>
                  </div>
				</div>
					@if(count($cari)!=0)
                    <div class="col-md-8 ">
                    @php($i=1)
                    <div class="row">           
                        @foreach ( $cari as $staff )
                          
                            <a href="/staff/{{ $staff->id }}">
                                <div class="col-md-4  col-sm-4 col-xs-4 col-lg-4 col-xl-4   " style="">
                                    <div class="judul">
                                      <h4>  {{ $staff->judul }}</h4>
                                    </div>
                                    <div class="foto">
                                        @if($staff->foto==null)
                                        <?php $staff->foto="user.png"?>
                                        @endif
                                        <img src="/images/data_guru/{{ $staff->foto }}" class="img-thumb" width="80%" alt="">
                                    </div>
                                    <div class="tanggal" style="padding:1%">
                                       <b> {{ $staff->nama }}<br>
                                       <b>{{ $staff->jenis }}
                                    </div>
                                
                                </div>
                                </a>
                                @php($i++)
                                @if($i%3==1)
                            </div>
                            <div class="row">
                            @endif
                            @endforeach
                        </div>
                        {{$cari->links()}}
                        </div>
                    @else
                    <div class="col-md-8">
                        <h1 style="margin-top:35%; text-align:center">Data Kosong</h1>
                    </div> 
                    @endif                  
                   
			        </div>
            
		<DIV>
      
        </DIV>	
		</div>
		</div>
        
	</section>

@endsection
@section('script')
	

@endsection
