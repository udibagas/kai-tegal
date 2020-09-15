<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function bulanan(Request $request)
    {
        // get report by jenis sarana by bulan (tanggal masuk)
        return Order::groupBy('jenis_sarana_id')
            ->whereMonth('tanggal_masuk', $request->bulan)
            ->join('jenis_saranas', 'jenis_saranas.id', 'orders.jenis_sarana_id')
            ->selectRaw('COUNT(orders.id) AS jumlah, jenis_saranas.kode AS jenis_sarana')
            ->get()->map(function ($item) {
                return [
                    'jumlah' => $item->jumlah,
                    'jenis_sarana' => $item->jenis_sarana,
                ];
            });
    }

    public function tahunan(Request $request)
    {
        return  ['Target' => 100, 'Realisasi' => 90];
    }
}
