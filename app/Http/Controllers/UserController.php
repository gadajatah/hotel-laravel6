<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('user.index', [
            'room_types'    => RoomType::orderBy('name', 'asc')->get(),
            'rooms'         => Room::orderBy('name', 'asc')->get(),
        ]);
    }

    public function type($id) {
        $room_types = Room::with('roomType')->where('room_type_id', $id)->get();
        return view('user.type', [
            'rooms'          => RoomType::orderBy('name', 'asc')->get(),
            'room_types'    => $room_types,
        ]);
    }

    public function booking($id) {
        $room = Room::with('roomType')->find($id);
        return view('user.booking', [
            'room'  => $room
        ]);
    }

    public function bayar(Request $request) {
        $bayar = Booking::create([
            'checkin_date'  => date('Y-m-d', strtotime($request->input('checkin_date'))),
            'checkout_date' => date('Y-m-d', strtotime($request->input('checkout_date'))),
            'qty'           => $request->input('qty'),
            'room_id'       => $request->input('room_id'),
            'user_id'       => $request->input('user_id'),
            'status'        => 0,
        ]);

        return redirect()->route('transfer');
    }

    public function transfer($harga) {
        return view('user.konfirmasi-bank', [
            'banks' => Bank::orderBy('name', 'asc')->get(),
            'price' => $harga
        ]);
    }

    public function konfirmasiPembayaran() {
        return view('user.konfirmasi-pembayaran', [
            'banks' => Bank::orderBy('name', 'asc')->get()
        ]);
    }

    public function konfirmasi(Request $request) {
        $pembayaran = Pembayaran::create([
            'user_id'   => Auth::user()->id,
            'bank_id'   => $request->input('bank_id'),
            'tanggal'   => date('Y-m-d', strtotime($request->input('tanggal'))),
            'jumlah'    => $request->input('jumlah'),
            'status'    => 0,
        ]);

        return redirect()->route('status-pembayaran');
    }

    public function status() {
        return view('user.status-pembayaran', [
            'pembayaran' => Pembayaran::where('user_id', Auth::user()->id)->get(),
        ]);
    }
}
