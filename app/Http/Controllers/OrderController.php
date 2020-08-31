<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderCollection;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resource = Order::when($request->keyword, function ($q) use ($request) {
            $q->where(function ($q) use ($request) {
                $q->where('nomor', 'LIKE', "%{$request->keyword}%")
                    ->orWhereHas('sarana', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', "%{$request->keyword}%");
                    });
            });
        })->when($request->tanggal_masuk, function ($q) use ($request) {
            $q->whereBetween('tanggal_masuk', $request->tanggal_masuk);
        })->when($request->jenis_sarana_id, function ($q) use ($request) {
            $q->whereIn('jenis_sarana_id', $request->jenis_sarana_id);
        })->when($request->dipo_id, function ($q) use ($request) {
            $q->whereIn('dipo_id', $request->dipo_id);
        })->when($request->jalur_id, function ($q) use ($request) {
            $q->whereIn('jalur_id', $request->jalur_id);
        })->when($request->jenis_pekerjaan_id, function ($q) use ($request) {
            $q->whereIn('jenis_pekerjaan_id', $request->jenis_pekerjaan_id);
        })->when($request->status, function ($q) use ($request) {
            $q->whereIn('status', $request->status);
        })->orderBy('updated_at', 'desc')->paginate($request->pageSize);

        return new OrderCollection($resource);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = Order::create(array_merge($request->all(), [
            'user_id' => auth()->user()->id
        ]));

        return [
            'message' => 'Data telah disimpan',
            'data' => $order
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $order->load([
            'orderDetail',
            'orderProgress',
            'user',
            'sarana',
            'jenisSarana',
            'jalur',
            'dipo',
            'jenisPekerjaan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return [
            'message' => 'Data telah disimpan',
            'data' => $order
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        DB::transaction(function () use ($order) {
            $order->delete();
            $order->orderDetail()->delete();
            $order->orderProgress()->delete();
        });

        return ['message' => 'Data telah dihapus'];
    }
}
