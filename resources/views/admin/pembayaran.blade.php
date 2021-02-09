@extends('layouts.apps')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Manage Bank Account</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="dt-table table-responsive">
                                    <table class="table table-sm table-bordered" id="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Pembayar</th>
                                                <th>Bank Tujuan</th>
                                                <th>Jumlah</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($pembayarans as $key =>$pb)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $pb->tanggal }}</td>
                                                    <td>{{ $pb->user->name }}</td>
                                                    <td>{{ $pb->bank->name }}/{{ $pb->bank->no_rek }}/{{ $pb->bank->a_n }}</td>
                                                    <td>{{ $pb->jumlah }}</td>
                                                    <td>
                                                        @if ($pb->status === 0)
                                                            <form action="{{ route('konfir') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="hidden_id" value="{{ $pb->id }}">
                                                                <button type="submit" class="btn btn-sm btn-success">Konfirmasi</button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('batal') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="hidden_id" value="{{ $pb->id }}">
                                                                <button type="submit" class="btn btn-sm btn-danger">Batalkan</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection