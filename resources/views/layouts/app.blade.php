<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">
    <meta name="theme-color" content="#4f46e5">
    <link rel="manifest" href="/manifest.json">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications()->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Notifications</span>
                    @forelse(auth()->user()->unreadNotifications()->take(5)->get() as $notification)
                        <div class="dropdown-item">
                            {{ $notification->data['message'] ?? 'Notification' }}
                            <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="dropdown-divider"></div>
                    @empty
                        <div class="dropdown-item text-center text-muted">No new notifications</div>
                    @endforelse
                    <div class="dropdown-divider"></div>
                    <form method="post" action="#" class="dropdown-item dropdown-footer">
                        @csrf
                        <button type="button" class="btn btn-sm btn-link" id="mark-notifications">Mark all read</button>
                    </form>
                </div>
            </li>
            <li class="nav-item">
                <form method="post" action="/logout">
                    @csrf
                    <button class="btn btn-link nav-link" type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <span class="brand-text font-weight-light">Uptech Solution</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Dashboard</p></a>
                    </li>
                    <li class="nav-item"><a href="/projects" class="nav-link"><i class="nav-icon fas fa-folder"></i><p>Projects</p></a></li>
                    <li class="nav-item"><a href="/tasks" class="nav-link"><i class="nav-icon fas fa-tasks"></i><p>Tasks</p></a></li>
                    <li class="nav-item"><a href="/tickets" class="nav-link"><i class="nav-icon fas fa-life-ring"></i><p>Tickets</p></a></li>
                    <li class="nav-item"><a href="/leaves" class="nav-link"><i class="nav-icon fas fa-plane"></i><p>Leave</p></a></li>
                    <li class="nav-item"><a href="/profile" class="nav-link"><i class="nav-icon fas fa-user"></i><p>Profile</p></a></li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>@yield('title')</h1>
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script>
    $('#mark-notifications').on('click', function () {
        $.ajax({
            url: '/notifications/read-all',
            method: 'POST',
            data: {_token: '{{ csrf_token() }}'},
        }).done(function () {
            location.reload();
        });
    });

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js');
    }

    let deferredPrompt;
    window.addEventListener('beforeinstallprompt', (event) => {
        event.preventDefault();
        deferredPrompt = event;
    });
</script>
@stack('scripts')
</body>
</html>
