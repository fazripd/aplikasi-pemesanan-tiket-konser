@extends('layouts.layouts')
@section('container')
<h1 class="text-center">Pesan Tiket</h1>
<div class="container container-sm">
    <form class="d-flex" id="form">
        @csrf
        <input class="form-control" type="search" placeholder="Search NIK" aria-label="Search" id="search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
</div>
<div class="container">
    <div id="hasil">
        <table class="table">
            <tr>
                <td>ID Tiket</td>
                
                <td></td>
            </tr>
            <tr>
                <td>Nama</td>
                
                <td></td>
    
            </tr>
            <tr>
                <td>Alamat</td>
                
                <td></td>
    
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                
                <td></td>
    
            </tr>
            <tr>
                <td>Golongan Darah</td>
                
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-primary">Cetak</button></td>
                <td></td>
            </tr>
            
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
    console.log('gas')
    $('#form').on('submit', function(e){
        e.preventDefault();
        hasil = document.getElementById('search').value;
        var table = "";
        $.ajax({
            type: 'get',
            url: '/search',
            data: {'id': hasil},
            success: function(data){
                console.log(data);
                for (let i = 0; i < data.length; i++) {
                    table+='<table class="table">';
                    table+='<tr><td>ID Tiket</td>';
                    table+='<td>'+data[i].id_tiket+'</td></tr>';
                    table+='<tr><td>Nama</td>';
                    table+='<td>'+data[i].nama+'</td></tr>';
                    table+='<tr><td>Alamat</td><td>'+data[i].alamat+'</td></tr>';
                    table+='<tr><td>Jenis Kelamin</td><td>'+data[i].jenis_kelamin+'</td></tr>';
                    table+='<tr><td>Golongan Darah</td><td>'+data[i].goldar+'</td></tr>';
                    table+='<tr><td></td><td><button class="btn btn-primary">Cetak</button></td><td></td></tr></table>';

                }
                
                $('#hasil').html(" ");
                    $('#hasil').append(table);
            },
            error: function(){
                console.log('error')
            }
        })
    });
});
</script>
@endsection
