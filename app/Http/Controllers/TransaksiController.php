<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use App\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function pemasukan()
    {
        $pemasukan = Pemasukan::orderBy('id', 'desc')->get();
        return view('pemasukan', ["key" => "pemasukan", 'pm' => $pemasukan]);
    }

    public function addpemasukan()
    {
        return view('addpemasukan', ["key" => "pemasukan"]);
    }

    public function savepemasukan(Request $request)
    {
        Pemasukan::create([
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/pemasukan')->with('alert', 'Data Berhasil Ditambahkan');
    }

    public function updatePemasukan($id, Request $request)
    {
        $pm = Pemasukan::find($id);
        $pm->tanggal = $request->tanggal;
        $pm->jumlah = $request->jumlah;
        $pm->keterangan = $request->keterangan;
    
        $pm->save();
        return redirect('/pemasukan')->with('alert', 'Data Berhasil Diubah');
    }

    public function editPemasukan($id)
    {
        $pemasukan = Pemasukan::find($id);
        return view('editPemasukan', ["key" => "pemasukan", "pm" => $pemasukan]);
    }

    public function deletePemasukan($id)
    {
        $pm = Pemasukan::find($id);
        $pm->delete();
        return redirect('/pemasukan')->with('alert', 'Data Berhasil Dihapus');
    }

    public function pengeluaran()
    {
        $pengeluaran = Pengeluaran::orderBy('id', 'desc')->get();
        return view('pengeluaran', ["key" => "pengeluaran", 'pg' => $pengeluaran]);
    }

    public function addpengeluaran()
    {
        return view('addpengeluaran', ["key" => "pengeluaran"]);
    }

    public function savepengeluaran(Request $request)
    {
        Pengeluaran::create([
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/pengeluaran')->with('alert', 'Data Berhasil Ditambahkan');
    }

    public function editPengeluaran($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('editPengeluaran', ["key" => "pengeluaran", "pg" => $pengeluaran]);
    }

    public function updatePengeluaran($id, Request $request)
    {
        $pg = Pengeluaran::find($id);
        $pg->tanggal = $request->tanggal;
        $pg->jumlah = $request->jumlah;
        $pg->keterangan = $request->keterangan;
    
        $pg->save();
        return redirect('/pengeluaran')->with('alert', 'Data Berhasil Diubah');
    }

    public function deletePengeluaran($id)
    {
        $pg = Pengeluaran::find($id);
        $pg->delete();
        return redirect('/pengeluaran')->with('alert', 'Data Berhasil Dihapus');
    }

    public function monthlyReport()
    {
        $pemasukanBulanan = Pemasukan::select(
            DB::raw('YEAR(tanggal) as year'),
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('SUM(jumlah) as total')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

        $pengeluaranBulanan = Pengeluaran::select(
            DB::raw('YEAR(tanggal) as year'),
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('SUM(jumlah) as total')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

        $profitBulanan = $pemasukanBulanan->map(function ($pemasukan) use ($pengeluaranBulanan) {
            $pengeluaran = $pengeluaranBulanan->first(function ($value) use ($pemasukan) {
                return $value->year == $pemasukan->year && $value->month == $pemasukan->month;
            });

            $pengeluaranTotal = $pengeluaran ? $pengeluaran->total : 0;

            return (object) [
                'year' => $pemasukan->year,
                'month' => $pemasukan->month,
                'pemasukan' => $pemasukan->total,
                'pengeluaran' => $pengeluaranTotal,
                'profit' => $pemasukan->total - $pengeluaranTotal
            ];
        });

        return view('laporan', ["key" => "laporan", 'profitBulanan' => $profitBulanan]);
    }

    public function actsearchdata(Request $request)
    {
        $cari = $request->input('q');
        $month = $request->input('month');
        $year = explode('-', $month)[0];
        $month = explode('-', $month)[1];

        $carbonDate = \Carbon\Carbon::create($year, $month, 1);

        $firstDayOfMonth = $carbonDate->startOfMonth()->format('Y-m-d');
        $lastDayOfMonth = $carbonDate->endOfMonth()->format('Y-m-d');

        if ($cari) {
            $pemasukan = Pemasukan::where('tanggal', 'LIKE', "%$cari%")->get();
            $pengeluaran = Pengeluaran::where('tanggal', 'LIKE', "%$cari%")->get();

        } else {
            $pemasukan = Pemasukan::whereBetween('tanggal', [$firstDayOfMonth, $lastDayOfMonth])->get();
            $pengeluaran = Pengeluaran::whereBetween('tanggal', [$firstDayOfMonth, $lastDayOfMonth])->get();
        }

        return view("actsearchdata", compact('pemasukan', 'pengeluaran'));
    }
}
