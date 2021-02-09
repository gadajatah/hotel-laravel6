@extends('layouts.app-user')

@section('content')
<div class="row mb-2">
    <div class="col-xl-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4>Bayar total pembayaran anda melalui Rekening dibawah ini:</h4>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card-body shadow-sm">
                            <ul>
                                @foreach ($banks as $bank)
                                    <li>
                                        {{ $bank->name }} = 
                                        <span class="text-muted">
                                            {{ $bank->no_rek }}/{{ $bank->a_n }}
                                        </span>
                                    </li>
                                    <li>
                                        <strong>
                                            Total yang harus anda bayar ialah IDR {{ $price }} <span class="text-muted">(sudah termasuk pajak)</span>
                                        </strong>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card-body shadow-sm">
                            <p>
                                Apabila telah membayar, silahkan konfirmasi pembayaran anda disini<br>
                                <a href="{{ route('konfirmasi') }}" class="btn btn-sm btn-success shadow-sm">
                                    Konfirmasi
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection