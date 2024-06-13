@extends('layouts.main')

@section('title', 'Laporan Bulanan')

@section('content')
<div class="container">
    <h2>Laporan Bulanan</h2>
    <table id="profitTable" class="table table-striped">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Total Profit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profitBulanan as $report)
                <tr>
                    <td>{{ $report->year }}</td>
                    <td>{{ \Carbon\Carbon::create()->month($report->month)->format('F') }}</td>
                    <td>
                    <div class="amount">
                        <span>Rp.</span>
                        <span>{{ number_format($report->pemasukan, 0, ',', '.') }}</span>
                    </div>
                    </td>
                    <td>
                    <div class="amount">
                        <span>Rp.</span>
                        <span>{{ number_format($report->pengeluaran, 0, ',', '.') }}</span>
                    </div>
                    </td>
                    <td>
                    <div class="amount">
                        <span>Rp.</span>
                        <span>{{ number_format($report->profit, 0, ',', '.') }}</span>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#profitTable').DataTable();
    });
</script>
@endsection
