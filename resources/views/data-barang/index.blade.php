@extends('layouts.admin')

@section('title', 'Data Barang')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Button Tambah -->
                <a href="/data-barang/create" class="btn btn-primary btn-rounded">Tambah Barang</a>
                <div class="table-responsive mt-3">
                    <!-- Session Alert Success  -->
                    @if (!empty(session('pesan')))
                    <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{session('pesan')}}</strong>
                    </div>
                    @endif
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Kode barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Berat Barang</th>
                                <th>Dibuat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data_barang as $b)
                            <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $b->kode_barang }}</td>
                            <td>{{ $b->nama_barang }}</td>
                            <td>{{ $b->jumlah }}</td>
                            <td>{{ $b->berat }} Kg</td>
                            <td>{{ date("d-m-Y", strtotime($b->created_at))}}</td>
                            <td class="text-center">
                                <a href="/data-barang/{{$b->kode_barang}}/detail" class="btn btn-info btn-sm btn-rounded">Detail</a>
                                <a href="/data-barang/{{$b->kode_barang}}/edit" class="btn btn-warning btn-sm btn-rounded">Ubah</a>
                                <form action="/data-barang/{{$b->kode_barang}}/destroy" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Hapus" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger btn-rounded">
                                </form>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection