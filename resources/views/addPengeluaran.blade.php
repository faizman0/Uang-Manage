@extends('layouts.main')

@section('title', 'Halaman Tambah Pengeluaran')

@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Pengeluaran
        </div>
        <div class="card-body">
            <form action="/savepengeluaran" method="post">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
                </div>
                <div class="form-group float-right">
                    <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
