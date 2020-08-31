<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SaranaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($item) {
                return array_merge($item, [
                    'depo' => $this->depo->nama,
                    'jenis_sarana' => $this->jenisSarana->nama
                ]);
            })
        ];
    }
}
