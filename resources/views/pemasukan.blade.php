@extends('layouts.main')

@section('title', 'Halaman Pemasukan')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/pemasukan/add" class="btn btn-primary">Tambah Pemasukan</a>
        </div>
        <div class="card-body">
            @if (session('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pm as $idx => $p)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>
                                <div class="amount">
                                    <span>Rp.</span>
                                    <span>{{ number_format($p->jumlah, 0, ',', '.') }}</span>
                                </div>
                            </td>
                            <td>{{ $p->keterangan }}</td>
                            <td>
                                <a href="/pemasukan/editPemasukan/{{ $p->id }}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
                                <a href="/deletePemasukan/{{ $p->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        {{-- datatables --}}
    </div>
@endsection

@section('scripts')
    <!-- Include DataTables CSS and JS here -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
