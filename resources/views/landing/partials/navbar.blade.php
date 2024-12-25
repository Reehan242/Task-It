@if (Route::has('login'))
    <nav class="navbar navbar-expand-lg" style="background-color: black">
        <div class="container ">
            <a class="navbar-brand d-flex" href="{{ route('landing') }}">
                <img src="{{ asset('img/logo.svg') }}" width="50" alt="">
                <h4 class="text-primary">Task</h4>
                <h4 class="text-light">- It!</h4>
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#navWelcome" aria-controls="navWelcome" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navWelcome" name="navWelcome">
                <ul class="text-white navbar-nav ms-auto mb-2">
                    @auth
                        <li class="nav-item ">
                            <a href="{{ url('/dashboard') }}" class=" page-link rounded-md px-3 py-2">
                                Dashboard <i class="bi bi-house-gear"></i>
                            </a>
                        </li>
                    @else
                        <li class="nav-item ">
                            @if (Route::is('login'))
                            @else
                                <a href="{{ route('login') }}" class=" page-link rounded-md px-3 py-2 ">
                                    Log in <i class="bi bi-box-arrow-in-right"></i>
                                </a>
                            @endif

                        </li>
                        <li class="nav-item ">
                            @if (Route::has('register'))
                                @if(Route::is('register') === false)
                                <a href="{{ route('register') }}" class="navbar-dark page-link rounded-md px-3 py-2">
                                    Register <i class="bi bi-person-add"></i>
                                </a>
                                @endif
                            @endif
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
@endif
