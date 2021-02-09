@extends('layouts.apps')

@section('title', 'Admin Dashboard Hotel')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Hello card</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        {{-- <li><i class="feather icon-refresh-cw reload-card"></i></li> --}}
                        {{-- <li><i class="feather icon-trash close-card"></i></li> --}}
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                @if (session('success'))
                    <div class="alert alert-success">
                        <span>{{ session('success') }}</span>
                    </div>
                @else
                    <div class="alert alert-secondary">
                        <span>Anda telah login sebagai Admin</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection