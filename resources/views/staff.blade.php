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
				</div>
					@if(count($cari)!=0)
                    <div class="col-md-8">
                    @php($i=1)
             
                        @foreach ( $cari as $staff )
                            <div class="row">
                                <div class="col-md-4 " style="">
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
                                    <div class="baca">
                                       <a href="/staff/{{ $staff->id }}"> <button class="mt-2 btn btn-primary btn-sm">
                                                Lihat Profile
                                        </button>
                                       </a>
                                    
                                    </div>
                                </div>
                                @php($i++)
                                @if($i%3==1)
                            </div>
                            <div class="row">
                            @endif
                            @endforeach
                        </div>
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