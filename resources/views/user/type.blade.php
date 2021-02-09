@extends('layouts.app-user')

@section('content')
<div class="nav-scroller mb-2">
    <nav class="nav d-flex justify-content-center">
        <h5 class="text-muted">Room Type</h5>
    </nav>
</div>
<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach ($rooms as $room_type)
            <a class="p-2 text-muted" href="/type/{{ $room_type->id }}">{{ $room_type->name }}</a>
        @endforeach
    </nav>
</div>
<div class="row mb-2">
    @foreach ($room_types as $rt)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <span class="text-muted">Type </span><strong class="d-inline-block mb-2 text-primary">{{ $rt->roomType->name }}</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Kamar No. {{ $rt->name }}</a>
                    </h3>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="#!" class="btn btn-sm btn-primary shadow-sm mt-2">Book Now!</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="
                @if ($rt->roomType->name == 'Junior Suite')
                {{ asset('img/junior-suite.jpg') }}
                @elseif ($rt->roomType->name == 'Standard')
                {{ asset('img/standard.jpg') }}
                @elseif ($rt->roomType->name == 'Suite')
                {{ asset('img/suite.jpeg') }}
                @elseif ($rt->roomType->name == 'Superior')
                {{ asset('img/superior.jpg') }}
                @endif" alt="Room Image" width="500">
            </div>
        </div>
    @endforeach
</div>
@endsection