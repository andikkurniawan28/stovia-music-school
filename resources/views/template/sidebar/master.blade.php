<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-music"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <hr class="sidebar-divider my-0">

        @include('template.sidebar.list', [ 'route' => 'home', 'icon' => 'home', 'title' => 'home', ])
        @include('template.sidebar.list', [ 'route' => 'users.index', 'icon' => 'user', 'title' => 'user', ])
        @include('template.sidebar.list', [ 'route' => 'roles', 'icon' => 'door-open', 'title' => 'role', ])
        @include('template.sidebar.list', [ 'route' => 'instruments.index', 'icon' => 'guitar', 'title' => 'instrument', ])
        @include('template.sidebar.list', [ 'route' => 'grades.index', 'icon' => 'graduation-cap', 'title' => 'grade', ])
        @include('template.sidebar.list', [ 'route' => 'courses.index', 'icon' => 'star', 'title' => 'kursus', ])
        @include('template.sidebar.list', [ 'route' => 'logs', 'icon' => 'history', 'title' => 'log', ])

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
