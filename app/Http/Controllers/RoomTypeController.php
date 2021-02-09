<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoomTypeController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $room_types = RoomType::latest()->get();
            return DataTables::of($room_types)
                ->addIndexColumn()
                ->addColumn('action', function ($room_types) {
                    $button = '<button type="button" id="'.$room_types->id.'" class="edit btn btn-primary btn-sm shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$room_types->id.'" class="delete btn btn-danger btn-sm shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.room-type');
    }

    public function store(Request $request) {
        RoomType::create(['name' => $request->input('name')]);
        return response()->json(['success' => 'Data berhasil di tambahkan', 'error' => 'Data Gagal ditambahkan']);
    }

    public function edit($id) {
        $type = RoomType::find($id);
        return response()->json(['type' => $type]);
    }

    public function update(Request $request) {
        RoomType::whereId($request->input('hidden_id'))->update(['name' => $request->input('name')]);
        return response()->json(['success' => 'Data berhasil di update', 'error' => 'Data Gagal di update']);
    }

    public function delete($id) {
        $room_type = RoomType::find($id);
        $room_type->delete();
        return response()->json(['success' => 'Data berhasil di hapus', 'error' => 'Data Gagal di hapus']);
    }
}
