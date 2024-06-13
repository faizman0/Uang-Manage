@extends('layouts.main')
@section('title', 'Form Ubah Password')
@section('content')
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        @if(session('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="/updateuser" method="POST">
            @csrf
              <div class="form-group">
                <label for="pb">Password Baru</label>
                <input type="password" name="passwordbaru" id="pb" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="form-group">
                <label for="cbp">Confirmasi Password Baru</label>
                <input type="password" name="confirmasipassword" id="cpb" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Update Password</button>
              </div>
        </form>
    </div>
</div>
@endsection