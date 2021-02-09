<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="blog-header-logo text-muted" href="{{ route('index') }}">Hotel Booking System</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            @guest
                @if (Route::has('login'))
                    <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('login') }}">Login</a>
                @endif

                @if (Route::has('register'))
                    <a class="btn btn-sm btn-success" href="{{ route('register') }}">Sign up</a>
                @endif

            @else
                <a class="text-muted mr-2" href="#">{{ Auth()->user()->name }}</a>
                
                <a class="text-muted mr-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</header>