<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Http\Resources\PesananResource;
use Carbon\Carbon;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('detailTransaksi.menu')->get();
        return PesananResource::collection($pesanan);
    }

    public function show($id)
    {
        $pesanan = Pesanan::with('detailTransaksi.menu')->findOrFail($id);
        return new PesananResource($pesanan);
    }
}
