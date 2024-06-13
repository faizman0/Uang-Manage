<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- IMPORT BOOTSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- IMPORT DATATABLES --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">

    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container-fluid">
    {{--HEADER--}}
    <div class="row">
      <div class="col-lg-12 py-2 bg-primary text-white d-flex justify-content-between align-items-center">
        <div class="btn btn-light"><a href="/home" style="text-decoration:none"> < Kembali </a></div>
        <div class="col-mt-10">
                <form action="/actsearchdata" method="get">
                @csrf
                    <div class="input-group mt-1 ">
                      <input type="month" name="month" class="form-control" value="{{ request()->input('month') ?? now()->format('Y-m') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            </div>

 <div class="row">
    <div class="container">
    <h2>Pemasukan</h2>
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasukan as $idx => $p)
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
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
<div class="row">
    <div class="container">
    <h2>Pengeluaran</h2>
    <table id="example" class="table table-striped">
        <thead>
            <tr>    
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengeluaran as $idx => $p)
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
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
      </div>
    </div>

  </body>
</html>
