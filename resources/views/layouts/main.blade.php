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
        <h1 class="mb-0">Uang Manage</h1>
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
          <div class="dropdown float-right">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person"></i>User
            </button>
            
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                <a class="dropdown-item" href="/edituser">Change password</a>
                <a class="dropdown-item" href="/logout">Logout</a>
            </div>
          </div>
      </div>
    </div>
    
      {{-- Baris Pertama --}}
      <div class="row">
      </div>
      {{-- Baris Kedua --}}
      <div class="row ">
        <div class="col-lg-2 vh-100 text-primary bg-light">
          <div class="row mt-4">
            <div class="col-3">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link {{ $key == "home" ? 'active' : '' }}" href="/home" id="v-pills-home-tab" >Home</a>
                <a class="nav-link {{ $key == "pemasukan" ? 'active' : '' }}" href="/pemasukan" id="v-pills-pemasukan-tab" >Pemasukan</a>
                <a class="nav-link {{ $key == "pengeluaran" ? 'active' : '' }}" href="/pengeluaran" id="v-pills-pengeluaran-tab" >Pengeluaran</a>
                <a class="nav-link {{ $key == "laporan" ? 'active' : '' }}" href="/laporan" id="v-pills-laporan-tab" >Laporan Bulanan</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-10 vh-100 mt-2">
          @yield('content')
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    {{-- IMPORT DATATABLES --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script>
      new DataTable('#example', {
        layout: {
                bottomEnd: {
                    paging: {
                        boundaryNumbers: false
                    }
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#pemasukanTable').DataTable();
            $('#pengeluaranTable').DataTable();
        });
    </script>
  </body>
</html>