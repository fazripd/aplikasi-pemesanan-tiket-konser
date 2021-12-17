@extends('layouts.admin')
<title>Edit Pemesanan</title>
@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Pemesanan</h1>
</div>
@foreach ($edit as $item)
<form action="/admin/pemesanan/update" method="POST" autocomplete="off">
    @csrf
    <input type="text" value="{{$item->id}}" name="id" hidden>
    <div class="mb-3">
        <label for="nik" class="form-label" style="font-weight: bold">NIK</label>
        <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp" value="{{$item->nik}}">
    </div>
    <div class="mb-3">
        <label style="font-weight: bold" for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
        <input type="date" name="tanggal_pesan" id="tanggal_pesan"
            value="{{ Carbon\Carbon::parse($item->tanggal)->format('Y-m-d')}}" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label style="font-weight: bold" for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" value="{{$item->nama}}">
    </div>
    <div class="mb-3">
        <label style="font-weight: bold" for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$item->email}}">
    </div>
    <div class="mb-3">
        <label style="font-weight: bold" for="alamat" class="form-label">Alamat Sekarang</label>
        <input type="alamat" name="alamat" class="form-control" id="alamat" aria-describedby="alamatHelp" value="{{$item->alamat}}">
    </div>
    <div class="mb-3">
        <label style="font-weight: bold" for="jk" class="form-label">Jenis Kelamin</label>
        <select name="jk" id="jk" class="form-control">
            <option value="L" {{ $item->jenis_kelamin == 'L'? 'selected' : ''}}>Laki-Laki</option>
            <option value="P" {{ $item->jenis_kelamin == 'P'? 'selected' : ''}}>Perempuan</option>
        </select>
    </div>
    <div class="mb-3">
        <label style="font-weight: bold" for="goldar" class="form-label">Golongan Darah</label>
        <select name="goldar" id="goldar" class="form-control">
            <option value="1" {{ $item->goldar == '1'? 'selected' : ''}}>A</option>
            <option value="2" {{ $item->goldar == '2'? 'selected' : ''}}>B</option>
            <option value="3" {{ $item->goldar == '3'? 'selected' : ''}}>AB</option>
            <option value="4" {{ $item->goldar == '4'? 'selected' : ''}}>O</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
</form>
@endforeach

@endsection