@if(Route::currentRouteName() == $route)
    <li class="nav-item active">
@else
    <li class="nav-item">
@endif
        <a class="nav-link" href="{{ route($route) }}">
            <i class="fas fa-fw fa-{{ $icon }}"></i>
            <span>{{ ucfirst($title) }}</span>
        </a>
    </li>
