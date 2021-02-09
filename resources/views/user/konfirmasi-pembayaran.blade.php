@extends('layouts.app-user')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4>Konfirmasi pembayaran dengan menyertakan struk pembayaran:</h4>
                <form action="{{ route('konfirmasi') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="bank_id">Bank Tujuan:</label>
                                <select name="bank_id" id="bank_id" class="form-control form-control-sm" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }}/{{ $bank->no_rek }}/{{ $bank->a_n }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Pembayaran:</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jumlah">Jumlah yang dibayar:</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control form-control-sm" placeholder="0000" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Konfirmasi" class="btn btn-sm btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection