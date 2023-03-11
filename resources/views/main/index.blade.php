@extends('layout.index')
@section('container')
<div style="margin:10px"></div>
<div class="row">
    <div class="col-2">
        <a class="btn btn-success" href="/add">Tambah Data</a>
    </div>
    <div class="col">
        <?php if (session('success') != null) {  ?>
            <div class="btn btn-outline-success">
                Data Berhasil ditambahkan
            </div>
        <?php } ?>
        <?php if (session('successEdit') != null) {  ?>
            <div class="btn btn-outline-success">
                Data Berhasil diubah
            </div>
        <?php } ?>
        <?php if (session('successDelete') != null) {  ?>
            <div class="btn btn-outline-success">
                Data Berhasil dihapus
            </div>
        <?php } ?>
    </div>
</div>
<div style="margin:10px"></div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Keterangan</th>
            <th>Lokasi</th>
            <th>Unit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($main as $main)
        <tr>
            <td>{{ $i++; }} </td>
            <td>{{ $main->name }}</td>
            <td>{{ $main->description }}</td>
            <td>{{ $main->location }}</td>
            <td>{{ $main->unit }}</td>
            <td>
                <a href="/edit/{{ $main->id }}" class="btn btn-primary" style="border:none;text-decoration: none; padding:5px 5px 2px 5px"><i class="fa fa-edit"></i></a>
                <a href="/delete/{{ $main->id }}" class="btn btn-danger" style="border:none;text-decoration: none; padding:5px 5px 2px 5px"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>



@endsection