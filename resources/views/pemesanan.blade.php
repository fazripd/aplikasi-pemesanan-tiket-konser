@extends('layouts.admin')
<title>Daftar Pemesanan</title>
@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pemesanan</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Pemesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead style="text-align: center; color: black">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesan</th>
                        <th>ID Tiket</th>
                        <th>Biodata <br> Penonton</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                @php
                $no =1;
                @endphp
                <tbody style="color: black">
                    @foreach ($all as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ Carbon\Carbon::parse($item->tanggal_pesan)->isoFormat('D MMMM YYYY')}}</td>
                        <td>{{$item->id_tiket}}</td>
                        <td style="text-align: center; color: black">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal{{$item->id}}">
                                Biodata
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Data {{$item->id_tiket}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table" bordered="off" style="color: black">
                                                <tr>
                                                    <td>NIK:</td>
                                                    <td>{{$item->nik}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama:</td>
                                                    <td>{{$item->nama}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin:</td>
                                                    <td>{{$item->jenis_kelamin == 'L' ? 'Laki-Laki': 'Perempuan'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Golongan Darah:</td>
                                                    @if ($item->goldar == '1')
                                                        <td>A</td>
                                                    @elseif($item->goldar == '2')
                                                        <td>B</td>
                                                    @elseif($item->goldar == '3')
                                                        <td>AB</td>
                                                    @else
                                                        <td>O</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Alamat:</td>
                                                    <td>{{$item->alamat}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center">
                            <a href="/admin/pemesanan/edit/{{$item->id}}" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>

                            <a href="/admin/pemesanan/delete/{{$item->id}}" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
