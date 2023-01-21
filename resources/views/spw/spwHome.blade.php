@extends('adminlte::page')
@section('content')
<div class="col-12 wrapper p-5 " style="background:#ddeedd">
 <div class="row">
    <table id="tabel-data" class="table table-striped table-bordered" width="100%"  cellspacing="0">
        <thead>
          <th>No</th>
          <th>Nama Toko</th>
          <th>Pemasukan</th>
        </thead>
    </table>
 </div>
</div>
@endsection
@section('js')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#tabel-data').DataTable( {
processing: true,
serverSide: true,
ajax: "/wirausaha/spwHome/tampil",
columns: [{
    'data':'1',
    render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }
  },
    {
        'data':'nama','name':'nama'
    },
     {
        'data':'pemasukan','name':'pemasukan'
    }]
});
 })
</script>