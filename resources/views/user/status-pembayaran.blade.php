@extends('layouts.app-user')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>Tanggal</th>
                            <th>Pembayar</th>
                            <th>Bank Tujuan</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($pembayaran as $pb)
                            <tr>
                                <td>{{ $pb->tanggal }}</td>
                                <td>{{ $pb->user->name }}</td>
                                <td>{{ $pb->bank->name }}/{{ $pb->bank->no_rek }}/{{ $pb->bank->a_n }}</td>
                                <td>{{ $pb->jumlah }}</td>
                                <td>
                                    @if ($pb->status === 0)
                                        <span class="text-danger">Belum dikonfirmasi</span>
                                    @else
                                        <span class="text-success">Dikonfirmasi</span>
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
@endsection