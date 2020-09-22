<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function bulanan(Request $request)
    {
        // get report by jenis sarana by bulan (tanggal masuk)
        // return Order::groupBy('jenis_sarana_id')
        //     ->whereYear('tanggal_masuk', $request->tahun)
        //     ->whereMonth('tanggal_masuk', $request->bulan)
        //     ->join('jenis_saranas', 'jenis_saranas.id', 'orders.jenis_sarana_id')
        //     ->selectRaw('
        //         COUNT(orders.id) AS jumlah,
        //         jenis_saranas.kode AS jenis_sarana
        //     ')
        //     ->get()->map(function ($item) {
        //         return [
        //             'jumlah' => $item->jumlah,
        //             'jenis_sarana' => $item->jenis_sarana,
        //         ];
        //     });

        return DB::select("
            SELECT
                COUNT(o.id) AS realisasi,
                js.nama AS jenis_sarana,
                (SELECT SUM(target) FROM program_kerjas WHERE jenis_sarana_id = js.id AND tahun = ? AND bulan = ?) AS target
            FROM orders o
            JOIN jenis_saranas js ON js.id = o.jenis_sarana_id
            WHERE
                YEAR(o.tanggal_masuk) = ?
                AND MONTH(o.tanggal_masuk) = ?
            GROUP BY js.id
        ", [$request->tahun, $request->bulan, $request->tahun, $request->bulan]);
    }

    public function tahunan(Request $request)
    {
        return  ['Target' => 100, 'Realisasi' => 90];
    }
}
