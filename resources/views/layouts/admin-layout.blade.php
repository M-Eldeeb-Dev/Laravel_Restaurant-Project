<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Restaurant Management</title>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <link rel="stylesheet" href="../../css/dashboard.css">
    <link rel="icon" type="image/svg+xml" href="../../images/logo-icon.svg">

</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <nav class="col-md-3 col-lg-2 admin-sidebar">
                <div class="sidebar-header">
                    <h3>Gourmet Haven</h3>
                    <p>Admin Panel</p>
                </div>
                
                <div class="sidebar-nav">
                    <a href="{{ route('dashboard') }}" class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('categories.index') }}" class="nav-link-custom {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <i class="fas fa-tags"></i>
                        <span>Categories</span>
                    </a>
                    <a href="{{ route('meals.index') }}" class="nav-link-custom {{ request()->routeIs('meals.*') ? 'active' : '' }}">
                        <i class="fas fa-utensils"></i>
                        <span>Meals</span>
                    </a>
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </nav>
            

            <main class="col-md-9 col-lg-10 admin-content">
                <div class="content-header">
                    <h1>@yield('title', 'Dashboard')</h1>
                    @hasSection('subtitle')
                        <p>@yield('subtitle')</p>
                    @endif
                </div>
                
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

