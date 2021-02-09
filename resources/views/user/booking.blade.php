@extends('layouts.app-user')

@section('content')
<div class="row mb-2">
    <div class="col-xl-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="checkin_date">Tanggal Check-in:</label>
                            <div class="input-group">
                                <input type="text" id="checkin_date" name="checkin_date" class="form-control" placeholder="Tanggal Masuk">
                                <span class="input-group-append">
                                    <button class="btn btn-mini btn-primary" disabled>-</button>
                                </span>
                                <input type="text" id="checkout_date" name="checkout_date" class="form-control" placeholder="Tanggal Keluar">
                                <input type="hidden" name="room_id" value="{{ $room->id }}" id="room_id">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" id="user_id">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="qty">Jumlah Orang:</label>
                            <input type="number" name="qty" id="qty" class="form-control" value="1" placeholder="minimal 1 orang">
                        </div>
                    </div>
                </div>
                <h4>Informasi Kamar:</h4>
                <table class="table table-sm table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No. Kamar</th>
                            <th>Type</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{ $room->name }}</td>
                            <td class="text-center">{{ $room->roomType->name }}</td>
                            <td class="text-center">{{ $room->price }}</td>
                            <td class="text-center">
                                <a href="{{ route('index') }}" class="btn btn-danger btn-sm shadow-sm">Batal</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Total: {{ $room->price }}</strong></td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('transfer', $room->price) }}" class="btn btn-sm btn-success shadow-sm">Bayar <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // open the datepicker
    $('#checkin_date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
    $('#checkout_date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
</script>
@endpush