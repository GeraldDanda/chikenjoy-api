<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PesananResource extends JsonResource
{
    public function toArray($request)
    {
        $detailTransaksi = $this->detailTransaksi;
        $tanggalTransaksi = $detailTransaksi->waktu_transaksi->format('d-m-Y');

        // Data menu dan jumlah pesanan
        $menuData = $detailTransaksi->menus->map(function ($menu) {
            return [
                'nama_menu' => $menu->nama_menu,
                'harga_menu' => $menu->harga,
                'menu_terjual' => $menu->pivot->jumlah_pesanan,
                'pendapatan' => $menu->pivot->total_harga,
            ];
        });

        return [
            'hari' => $detailTransaksi->waktu_transaksi->format('l'),
            'tanggal' => $tanggalTransaksi,
            'penjualan' => $menuData,
        ];
    }
}
