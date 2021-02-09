<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoomController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $rooms = Room::latest()->get();
            return DataTables::of($rooms)
                ->addIndexColumn()
                ->editColumn('room_type_id', function (Room $room) {
                    return $room->roomType->name;
                })
                ->addColumn('action', function ($rooms) {
                    $button = '<button type="button" id="'.$rooms->id.'" class="edit btn btn-primary btn-sm shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$rooms->id.'" class="delete btn btn-danger btn-sm shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.room', [
            'room_types'    => RoomType::latest()->get(),
        ]);
    }

    public function store(Request $request) {
        Room::create(['name' => $request->input('name'), 'price' => $request->input('price'), 'room_type_id' => $request->input('room_type_id')]);
        return response()->json(['success' => 'Data berhasil di tambahkan', 'error' => 'Data Gagal ditambahkan']);
    }

    public function edit($id) {
        $type = Room::find($id);
        return response()->json(['type' => $type]);
    }

    public function update(Request $request) {
        Room::whereId($request->input('hidden_id'))->update(['name' => $request->input('name'), 'price' => $request->input('price'), 'room_type_id' => $request->input('room_type_id')]);
        return response()->json(['success' => 'Data berhasil di update', 'error' => 'Data Gagal di update']);
    }

    public function delete($id) {
        $room_type = Room::find($id);
        $room_type->delete();
        return response()->json(['success' => 'Data berhasil di hapus', 'error' => 'Data Gagal di hapus']);
    }
}
