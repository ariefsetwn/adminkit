@extends('layouts.admin')

@section('title', 'Detail Data Barang')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card shadow border-left-primary">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="@if(empty($data_barang->foto))
                                /img/default.jpeg
                              @else
                                {{"/img/" . $data_barang->foto}}
                              @endif" alt="" height="200px" width="200px" class="rounded">
                </div>
                <hr class="border-info">
                <h6>Kode Barang</h6>
                <P class="text-dark">{{$data_barang->kode_barang}}</P>
                <hr class="border-info">
                <h6>Nama Barang</h6>
                <p class="text-dark">{{$data_barang->nama_barang}}</p>
                <hr class="border-info">
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow border-left-primary">
            <div class="card-body">
                <a href="/data-barang/{{$data_barang->kode_barang}}/edit" class="btn btn-warning btn-rounded">Ubah</a>
                <a href="/data-barang" class="btn btn-secondary btn-rounded">Kembali</a>
                <hr class="border-info">
                <h6>Jumlah Barang</h6>
                <P class="text-dark">{{$data_barang->jumlah}}</P>
                <hr class="border-info">
                <h6>Berat Barang</h6>
                <p class="text-dark">{{$data_barang->berat}} Kg</p>
                <hr class="border-info">
                <h6>Dibuat</h6>
                <p class="text-dark">{{date("d-m-Y", strtotime($data_barang->created_at))}}</p>
                <hr class="border-info">
            </div>
        </div>
    </div>
</div>
@endsection