@extends('adminlte::page')
@section('content')
@if(isset($salah))
<div class="modal" style="display: show" tabindex="-1" role="dialog">
@else
<div class="modal" style="display: hidden" tabindex="-1" role="dialog">
@endif
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>password salah atau tidak sama</p>
        </div>
      </div>
    </div>
  </div>
<div class="col-12  p-5  " style="background:#ddeedd">
    <h3><center>Ubah Data Password</center></h3>
    <form action="/user/password-ubah" method="post">
 
 
    
      @csrf
    <div class="col-12">
      <h4>Password Lama</h4>
        <input type="password"  class="form-control" name="password_lama" id="">
    </div>
    <div class="col-12">
        <h4>Password Baru</h4>
        <input type="password" class="form-control" name="password_baru" id="">
    </div>
    <div class="col-12">
        <h4>Konfirmasi Password </h4>
        <input type="password_confirmation" class="form-control" name="password_confirm" id="">
    </div>
    <div class="col-12">
        <button class="btn btn-success">Kirim</button>
    </div>

</div>
</div>
</form>
@endsection
@section('js')
<script>

</script>
@endsection