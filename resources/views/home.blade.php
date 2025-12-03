<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmet Haven - Fine Dining Menu</title>
    <link rel="icon" type="image/svg+xml" href="../../images/logo-icon.svg">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="restaurant-font">Gourmet Haven</h1>
            <div class="divider"></div>
            <p>Experience Fine Dining at Its Finest</p>
        </div>
    </section>

    <!-- Category Filter -->
    <div class="category-filter">
        <div class="container">
            <div class="text-center">
                <h3 class="restaurant-font mb-4">Our Menu</h3>
                <div class="d-flex flex-wrap justify-content-center">
                    @php
                        $currentCategoryId = request()->route('id');
                        $isCategoryFilter = request()->routeIs('category.filter');
                    @endphp
                    @foreach ($categories as $category)
                        <a href="{{ route('category.filter', $category->id) }}" 
                           class="category-btn {{ ($isCategoryFilter && $currentCategoryId == $category->id) ? 'active' : '' }}">
                            <i class="fas fa-utensils me-2"></i>{{ $category->name }}
                        </a>
                    @endforeach
                    <a href="{{ route('home') }}" 
                       class="category-btn {{ !$isCategoryFilter ? 'active' : '' }}">
                        <i class="fas fa-th me-2"></i>Show All
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Meals Grid -->
    <div class="container mb-5">
        <div class="row g-4">
            @forelse($meals as $meal)
                <div class="col-md-6 col-lg-4">
                    <div class="meal-card">
                        <div class="meal-image-wrapper">
                            @if ($meal->image)
                                <img src="{{ asset('storage/' . $meal->image) }}" 
                                     alt="{{ $meal->name }}"
                                     loading="lazy">
                            @else
                                <div class="meal-image-placeholder">
                                    <i class="fas fa-utensils"></i>
                                </div>
                            @endif
                        </div>
                        <div class="meal-card-body">
                            <h5 class="meal-card-title">{{ $meal->name }}</h5>
                            <p class="meal-card-description">
                                {{ Str::limit($meal->description, 120) }}
                            </p>
                            <div class="meal-card-footer">
                                <span class="meal-price">${{ number_format($meal->price, 2) }}</span>
                                <span class="meal-category">{{ $meal->category->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-utensils"></i>
                        <h3 class="restaurant-font">No Meals Available</h3>
                        <p>We're currently updating our menu. Please check back soon!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4" style="background: #1a1a1a; color: rgba(255,255,255,0.7);">
        <div class="container">
            <p class="mb-0">
                &copy; {{ date('Y') }} {{ config('app.name', 'Restaurant') }}. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
