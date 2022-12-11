@extends('adminlte::page')
@section('content')
<style>
    @media only screen and (min-width:600px){
    .ck-editor__editable{
        min-height: 300px;
    }
}
</style>
@if(\Session::has('success'))
<div class="modal fade modaledit" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title l2" id="staticBackdropLabel" ></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-body2">
              <b>Data Berhasil Diubah</b>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endif
<form action="/admin/kelolaSekolah/ubah" method="post" enctype="multipart/form-data">
    @csrf
<div class="wrapper p-5">
    <table width="100%">
        <tr>
            <h5>Profile Sekolah</h5>
        </tr>
        <tr>
            <td>FB</td>
          
        </tr>
        <tr>
            <td><input type="url" class="form-control" name="fb" value="{{ $sekolah->fb  }}"></td>
        </tr>
        <tr>
            <td>Instagram</td>
            
        </tr>
        <tr>
            <td><input type="url" class="form-control"name="instagram" value="{{ $sekolah->instagram }}"></td>
        </tr>
        <tr>
            <td>No Telphone</td>
        </tr>
        <tr>
            <td><input type="number" class="form-control"name="no_hp" value="{{ $sekolah->no_hp }}"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
        </tr>
        <tr >
            <td style="height: 100%">
                <textarea  name="deskripsi"  id="editor" cols="30" rows="10"></textarea>
       
            </td>
        </tr>
        <tr>
            <td>Video</td>
        </tr>
        <tr>
                    <td><input type="url" class="form-control"name="video" ></td>
        </tr>
        <tr>
            <td>Jumlah Kelas</td>
        </tr>
        <tr>
                    <td><input type="number" class="form-control"name="kelas" "></td>
        </tr>
        <tr>
            <td style="text-align:right"><button type="submit" class="mt-5 btn btn-md-3 btn-primary">Kirim</button></td>
        </tr>
    </table>
</form>
</div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
<script>
     ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then(editor=>{
              window.editor=editor;
              myEditor = editor;
            })
            .catch( error => {
                console.error( error );
            });
       $(document).ready(function () {
        myEditor.setData('<?= $sekolah->deskripsi?>');
        $('.modal').modal('show');
       })
</script>
@endsection