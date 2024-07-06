<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        @auth
            <a class="navbar-brand fw-light" href="/dashboard"><span class="fas fa-brain me-1">
                </span>{{ config('app.name') }}</a>
        @endauth
        @guest
            <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1">
                </span>{{ config('app.name') }}</a>
        @endguest
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('login') ? 'text-white' : '' }}" aria-current="page"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('register') ? 'text-white' : '' }}"
                            href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lang', ['locale' => 'en']) }}">
                            <span>en</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lang', ['locale' => 'ar']) }}">
                            <span>ar</span>
                        </a>
                    </li>
                @endguest

                @auth

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item nav-link {{ Route::is('profile') ? 'text-white' : '' }}"
                                    href="{{ route('profile') }}">Profile</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            @can('admin', Auth::user())
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('admin.dashboard') ? 'text-white' : '' }}"
                                        href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                </li>
                            @endcan
                            <!-- Add more dropdown items here if needed -->
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>