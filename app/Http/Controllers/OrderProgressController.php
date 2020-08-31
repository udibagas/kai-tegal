<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderProgressRequest;
use App\OrderProgress;
use Illuminate\Http\Request;

class OrderProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return OrderProgress::when($request->order_id, function ($q) use ($request) {
            return $q->where('order_id', $request->order_id);
        })->orderBy('created_at', 'desc')->paginate($request->pageSize);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderProgressRequest $request)
    {
        $orderProgress = OrderProgress::create(array_merge($request->all(), [
            'user_id' => auth()->user()->id
        ]));

        // TODO: update order detail

        return [
            'message' => 'Data telah disimpan',
            'data' => $orderProgress
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProgress  $orderProgress
     * @return \Illuminate\Http\Response
     */
    public function update(OrderProgressRequest $request, OrderProgress $orderProgress)
    {
        $orderProgress->update($request->all());

        return [
            'message' => 'Data telah disimpan',
            'data' => $orderProgress
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderProgress  $orderProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProgress $orderProgress)
    {
        $orderProgress->delete();

        return ['message' => 'Data telah dihapus'];
    }
}
