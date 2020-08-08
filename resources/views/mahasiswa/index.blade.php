@extends('layouts.app')

@section('title', 'Halaman mahasiswa')
@section('bread1', 'Mahasiswa')
@section('bread2', 'Daftar')

@section('content')
    <h2>Daftar Mahasiswa</h2>
    <table class="table table-striped" id="mhs-table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        $(function () {  
    
            var table = $('#mhs-table').DataTables({
                pemrosesan : true, 
                serverSide : true , 
                ajax: "{{ route('mhs_list') }}", 
                kolom : [ 
                    { data : 'DT RowIndex' , nama : 'DT RowIndex' },  
                    { data : 'nim' , name : 'nim' },  
                    { data : 'nama_lengkap' , nama : 'nama_lengkap' },  
                ]       
            });
    
         });
    </script>

    @endsection 