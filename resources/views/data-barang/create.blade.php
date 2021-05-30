@extends('layouts.admin')

@section('title', 'Tambah Barang')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="/data-barang/store" method="POST" enctype="multipart/form-data">
                    @CSRF
                <!-- Kode Barang -->
                <div class="form-group row">
                    <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                    <input type="text" id="kode_barang" name="kode_barang" value="{{old('kode_barang')}}" class="form-control @error('kode_barang') is-invalid @enderror">
                    @error('kode_barang')
                        <div class="invalid-feedback"> {{$message}} </div>
                    @enderror
                    </div>
                </div>
                <!-- Nama Barang -->
                <div class="form-group row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                    <input type="text" id="nama_barang" name="nama_barang" value="{{old('nama_barang')}}" class="form-control @error('nama_barang') is-invalid @enderror">
                    @error('nama_barang')
                        <div class="invalid-feedback"> {{$message}} </div>
                    @enderror
                    </div>
                </div>
                <!-- jumlah barang -->
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Barang</label>
                    <div class="col-sm-10">
                    <input type="text" id="jumlah" name="jumlah" value="{{old('jumlah')}}" class="form-control @error('jumlah') is-invalid @enderror">
                    @error('jumlah')
                        <div class="invalid-feedback"> {{$message}} </div>
                    @enderror
                    </div>
                </div>
                <!-- berat barang -->
                <div class="form-group row">
                    <label for="berat" class="col-sm-2 col-form-label">Berat Barang</label>
                    <div class="col-sm-10 input-group">
                    <input type="text" id="berat" name="berat" value="{{old('berat')}}" class="form-control @error('berat') is-invalid @enderror">
                    @error('berat')
                    <div class="invalid-feedback"> {{$message}} </div>
                    @enderror
                    <div class="input-group-append">
                        <span class="input-group-text">.Kg</span>
                    </div>
                    </div>
                </div>
               <!-- Foto -->
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                    <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept=".jpg,.jpeg,.png">
                    @error('foto')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label"></div>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/data-barang" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection