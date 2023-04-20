@extends('layouts.user')
@section('isi')
<section class="blog" id="judul" style="background: green; padding-bottom:2%; ">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <marquee behavior="" direction="right">Selamat Datang Di SMK Ashabulyamin</marquee>
				<h3 style="color:white" class="post-title">Profile</h3>
                <h1  style="color:white; display:inline-block"class="post-title">Profile {{ $profile[0]->nama }}</h1><h2 style="float:right" id="timestamp"></h2>
            </div>
		</div>
	</div>
</section>
<section class="content" >
<div class="container mt-2">
    <div class="row">
    <div class="col-md-2">
    @if($profile[0]->foto==null)
        <?php $profile[0]->foto="user.png"?>
    @endif
        <img width="100%" src="/images/data_guru/{{$profile[0]->foto}}" alt="">
    </div>
    <div class="col-md-6 p-5">
        <table>
            <tr>
                <td colspan="3"><h4>Data Profile</h4></td>
            </tr>
            @foreach ( $profile as $profiles)

            <tr>
                <td>nama</td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->nama}}</td>
            </tr>
            <tr>
                <td>nuptk</td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->nuptk}}</td>
            </tr>
            <tr> <td>Tempat tanggal lahir</td>
            <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
            <td>{{$profiles->tempat_lahir}} {{$profiles->tanggal_lahir}}</td>
            </tr>
            <tr>
                <td>alamat</td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->alamat}}</td></tr>
                <tr><td>Pendidikan Terakhir</td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->pedidikan_terakhir}}</td>
                </tr>
                <tr>
                <td>jabatan</td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->jabatan}}</td>
                </tr>
                <tr>
                    <td>jenis kelamin</td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->jk}}</td>
                </tr>
                <tr><td>Kategori</td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->jenis}}</td>
            </tr>
            <tr>
                <td>Mulai Bekerja </td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->tanggal_masuk}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td colspan="2">:&nbsp;&nbsp;&nbsp;</td>
                <td>{{$profiles->email}}</td>
                </tr>
                <tr>
                    <td>Nomor HP</td><td colspan="2">:&nbsp;&nbsp;&nbsp;</td><td>{{$profiles->no_hp}}</td>
                </tr>
                
                @endforeach
                <tr>
                    <td>
                        <h4>Daftar Pelatihan</h4>
                    </td>
                </tr>
        </table>
    </div>
    <div class="col-md-4 col-sm-12" style="padding-bottom: 3%">
        <div class="col-md-12">
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
    <div class="col-md-12 widgets">
        <form action="">
            <table >
                <tr>
                    <td><h4>Kirim Kritik Guru</h4></td>
                </tr>
                <tr>
                    <td><textarea name="kritik" id=""  class="form" cols="30" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary btn-sm">Kirim</button></td>
                </tr>
            </table>
        </form>
    </div>


    </div>
    </div>
</div>
</section>
@endsection
@section('script')
@endsection
