@extends('layouts.admin-layout')
@section('title', 'Meals')
@section('subtitle', 'Manage your menu items')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="restaurant-font mb-0">Menu Items</h3>
            <p class="text-muted mb-0 small">Manage all your restaurant meals</p>
        </div>
        <a href="{{ route('meals.create') }}" class="btn btn-restaurant">
            <i class="fas fa-plus me-2"></i>Add New Meal
        </a>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success alert-restaurant mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif
    
    @if($meals->count() > 0)
        <div class="card card-restaurant">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-restaurant mb-0">
                        <thead>
                            <tr>
                                <th><i class="fas fa-image me-2"></i>Image</th>
                                <th><i class="fas fa-utensils me-2"></i>Name</th>
                                <th><i class="fas fa-dollar-sign me-2"></i>Price</th>
                                <th><i class="fas fa-tag me-2"></i>Category</th>
                                <th><i class="fas fa-align-left me-2"></i>Description</th>
                                <th class="text-center"><i class="fas fa-cog me-2"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meals as $meal)
                                <tr>
                                    <td>
                                        @if ($meal->image)
                                            <div class="meal-image-container">
                                                <img src="{{ asset('storage/' . $meal->image) }}" 
                                                     alt="{{ $meal->name }}"
                                                     class="meal-thumbnail">
                                            </div>
                                        @else
                                            <div class="meal-image-placeholder">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $meal->name }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-success fs-6">${{ number_format($meal->price, 2) }}</span>
                                    </td>
                                    <td>
                                        <span class="badge" style="background-color: #c9a961;">{{ $meal->category->name }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ Str::limit($meal->description ?? 'No description', 50) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <a href="{{ route('category.filter', $meal->category->id) }}" 
                                               class="btn btn-sm btn-restaurant-outline"
                                               title="View Meal">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('meals.edit', $meal) }}" 
                                               class="btn btn-sm btn-restaurant-outline"
                                               title="Edit Meal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('meals.destroy', $meal) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete {{ $meal->name }}?');">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-restaurant-outline bg-warning"
                                                        title="Delete Meal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card card-restaurant">
            <div class="card-body text-center p-5">
                <i class="fas fa-utensils fa-4x mb-3" style="color: #c9a961; opacity: 0.5;"></i>
                <h4 class="restaurant-font mb-2">No Meals Yet</h4>
                <p class="text-muted mb-4">Get started by adding your first menu item.</p>
                <a href="{{ route('meals.create') }}" class="btn btn-restaurant">
                    <i class="fas fa-plus me-2"></i>Create First Meal
                </a>
            </div>
        </div>
    @endif
@endsection
