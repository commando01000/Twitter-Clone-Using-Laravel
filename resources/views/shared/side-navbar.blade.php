<ul class="nav nav-link-secondary flex-column fw-bold gap-2">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }}"
            href="{{ route('dashboard') }}">
            <span>Home</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span>Explore</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('feed') }}">
            <span>Feed</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('terms') }}">
            <span>Terms</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span>Support</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span>Settings</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('lang', ['locale' => 'en']) }}">
            <span>en</span></a>
        <a class="nav-link" href="{{ route('lang', ['locale' => 'ar']) }}">
            <span>ar</span>
        </a>
    </li>
</ul>
