@extends('layouts.app')
@section('title','Prodi Page')
@section('bread1','Prodi')
@section('bread2','Data')
@section('content')
    <h3>Master Data Prodi</h3>
    <p><a href="/prodi/create" class="btn btn-success btn-sm">Tambah</a></p>

    @include('layouts.alert')
    
    <table class="table table-striped" id="prodi-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Prodi</th>
                <th>Nama Prodi</th>
                <th>Kaprodi</th>
                <th>Pilihan</th>
            </tr>
        </thead>
    </table>
    <script>
    $(function() {
        $('#prodi-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('prodi.list') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'kode_prodi', name: 'kode_prodi' },
                { data: 'nama_prodi', name: 'nama_prodi' },
                { data: 'kaprodi', name: 'kaprodi' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
    </script>
@endsection