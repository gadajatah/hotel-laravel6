<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index() {
        return view('admin.pembayaran', [
            'pembayarans' => Pembayaran::latest()->get(),
        ]);
    }

    public function konfir(Request $request) {
        Pembayaran::whereId($request->input('hidden_id'))->update([
            'status'    => 1,
        ]);

        return back();
    }

    public function batal(Request $request) {
        Pembayaran::whereId($request->input('hidden_id'))->update([
            'status'    => 0,
        ]);

        return back();
    }
}
