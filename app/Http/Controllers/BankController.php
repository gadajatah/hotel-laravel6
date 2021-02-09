<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BankController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $banks = Bank::latest()->get();
            return DataTables::of($banks)
                ->addIndexColumn()
                ->addColumn('action', function ($banks) {
                    $button = '<button type="button" id="'.$banks->id.'" class="edit btn btn-primary btn-sm shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$banks->id.'" class="delete btn btn-danger btn-sm shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.bank');
    }

    public function store(Request $request) {
        Bank::create(['name' => $request->input('name'), 'no_rek' => $request->input('no_rek'), 'a_n' => $request->input('a_n')]);
        return response()->json(['success' => 'Data berhasil di tambahkan', 'error' => 'Data Gagal ditambahkan']);
    }

    public function edit($id) {
        $type = Bank::find($id);
        return response()->json(['type' => $type]);
    }

    public function update(Request $request) {
        Bank::whereId($request->input('hidden_id'))->update(['name' => $request->input('name'), 'no_rek' => $request->input('no_rek'), 'a_n' => $request->input('a_n')]);
        return response()->json(['success' => 'Data berhasil di update', 'error' => 'Data Gagal di update']);
    }

    public function delete($id) {
        $room_type = Bank::find($id);
        $room_type->delete();
        return response()->json(['success' => 'Data berhasil di hapus', 'error' => 'Data Gagal di hapus']);
    }
}
