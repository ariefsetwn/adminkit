@extends('layouts.admin')

@section('title', 'User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Button Tambah -->
                <a href="/user/create" class="btn btn-primary btn-rounded">Tambah User</a>
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
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Bergabung Pada</th>
                                {{-- <th>Role</th> --}}
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                {{-- <td>{{ $u->role->nama }}</td> --}}
                                <td>{{ date("d-m-Y", strtotime($u->created_at))}}</td>
                                {{-- <td>{{ $u->roles}}</td> --}}
                                <td class="text-center">
                                    <a href="/user/{{$u->id}}/edit" class="btn btn-warning btn-sm btn-rounded">Ubah</a>
                                    <form action="/user/{{$u->id}}/destroy" method="post" class="d-inline">
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