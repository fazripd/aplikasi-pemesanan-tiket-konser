@extends('layouts.layouts')
<title>Pesan Tiket</title>
@section('container')
<div class="container-md">
    <h1 class="text-center">Pesan Tiket</h1>
    <form action="/pesan-tiket/store" method="POST" autocomplete="off">
        @csrf
        <input type="text" value="{{$id}}" name="id" hidden>
        <div class="mb-3">
            <label for="nik" class="form-label" style="font-weight: bold">NIK</label>
            <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label style="font-weight: bold" for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
            <input type="date" name="tanggal_pesan" id="tanggal_pesan"
                value="{{ Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label style="font-weight: bold" for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label style="font-weight: bold" for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label style="font-weight: bold" for="alamat" class="form-label">Alamat Sekarang</label>
            <input type="alamat" name="alamat" class="form-control" id="alamat" aria-describedby="alamatHelp">
        </div>
        <div class="mb-3">
            <label style="font-weight: bold" for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label style="font-weight: bold" for="goldar" class="form-label">Golongan Darah</label>
            <select name="goldar" id="goldar" class="form-control">
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">AB</option>
                <option value="4">O</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>
@endsection
