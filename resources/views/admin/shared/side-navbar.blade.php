<ul class="nav nav-link-secondary flex-column fw-bold gap-2">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }}"
            href="{{ route('admin.dashboard') }}">
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.users') ? 'text-white bg-primary rounded' : '' }}"
            href="{{ route('admin.users') }}">
            <span>Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.ideas.index') ? 'text-white bg-primary rounded' : '' }}"
            href="{{ route('admin.ideas.index') }}">
            <span>Ideas</span></a>
    </li>
</ul>
