@extends('layouts.admin')

@section('title', 'Ubah User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="/user/{{$user->id}}/update" method="POST" enctype="multipart/form-data">
                    @CSRF
                    @method('PUT')
                <!-- Username -->
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" value="{{old('name') == '' ? $user->name : old('name')}}" class="form-control @error('name') is-invalid @enderror">
                      @error('name')
                        <div class="invalid-feedback"> {{$message}} </div>
                      @enderror
                    </div>
                </div>
                <!-- Email -->
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" id="email" name="email" value="{{old('email') == '' ? $user->email : old('email')}}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback"> {{$message}} </div>
                    @enderror
                    </div>
                </div>
                <!-- Password -->
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label"></div>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/user" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection