<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class DetailTransaksiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            // 'id_transaksi' => $this->id_transaksi,
            // 'id_user' => $this->id_user,
            'nama_pelanggan' => $this->nama_pelanggan,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'total_harga' => $this->total_harga,
            'metode_pembayaran' => $this->metode_pembayaran,
            'catatan' => $this->catatan,
            'waktu_transaksi' => [
                'hari' => Carbon::parse($this->created_at)->translatedFormat('l'), // Format hari
                'tanggal' => Carbon::parse($this->created_at)->translatedFormat('j F Y'), // Format tanggal
                'jam' => Carbon::parse($this->created_at)->format('H:i:s'),
            ],
            'nama_karyawan' => $this->user->nama_karyawan,
            'menu_dipesan' => $this->menus->unique('id_menu')->map(function ($menu) {
                return [
                    // 'id_menu' => $menu->id_menu,
                    'nama_menu' => $menu->nama_menu,
                    'jumlah_pesanan' => $menu->pivot->jumlah_pesanan,
                    'total_harga' => $menu->pivot->total_harga,
                ];
            }),
        ];
    }
}
