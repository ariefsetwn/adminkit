@extends('layouts.admin')

@section('title', 'Ubah Password')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <x-alert-session/>
                @if (!empty(session('error')))
                <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ session('error') }}</strong>
                </div>
                @endif
                <x-form act="/ubah-password/update" method="PUT">
                    <!-- Password Lama -->
                    <x-password name="old_password" text="Password Lama"/>
                    <!-- Password Baru-->
                    <x-password name="password" text="Password Baru"/>
                    <!-- Password Baru Confirm -->
                    <x-password name="password_confirmation" text="Ulangi Password"/>
                    <!-- Button -->
                    <x-group>
                      <x-submit text="Simpan"/>
                      <x-button link="/home" text="Kembali" type="secondary"/>
                    </x-group>
                  </x-form>
            </div>
        </div>
    </div>
</div>
@endsection