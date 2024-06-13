@extends('layouts.main')
@section('title', 'Halaman Edit Pemasukan')
    
@section('content')
    <h1>HALAMAN | EDIT PEMASUKAN</h1>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="/updatePemasukan/{{ $pm->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"value="{{  $pm->tanggal }}">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="{{  $pm->jumlah }}">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="{{  $pm->keterangan }}">
                </div>
                <div class="form-group float-right">
                    <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
