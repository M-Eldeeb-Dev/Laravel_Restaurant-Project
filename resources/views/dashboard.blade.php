@extends('layouts.admin-layout')
@section('title', 'Dashboard')
@section('subtitle', 'Manage your restaurant operations')
@section('content')

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card card-restaurant h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-tags fa-3x" style="color: #c9a961;"></i>
                    </div>
                    <h5 class="card-title restaurant-font mb-2">Categories</h5>
                    <p class="text-muted mb-3">Manage menu categories</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-restaurant w-100">
                        <i class="fas fa-arrow-right me-2"></i>View Categories
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card card-restaurant h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-utensils fa-3x" style="color: #c9a961;"></i>
                    </div>
                    <h5 class="card-title restaurant-font mb-2">Meals</h5>
                    <p class="text-muted mb-3">Manage menu items</p>
                    <a href="{{ route('meals.index') }}" class="btn btn-restaurant w-100">
                        <i class="fas fa-arrow-right me-2"></i>View Meals
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-12">
            <div class="card card-restaurant">
                <div class="card-body p-4">
                    <h4 class="restaurant-font mb-3">
                        <i class="fas fa-info-circle me-2" style="color: #c9a961;"></i>
                        Welcome to Restaurant Management
                    </h4>
                    <p class="mb-2">Use the navigation menu to manage different aspects of your restaurant:</p>
                    <ul class="mb-0">
                        <li><strong>Categories:</strong> Organize your menu into categories (e.g., Appetizers, Main Courses, Desserts)</li>
                        <li><strong>Meals:</strong> Add, edit, and manage individual menu items</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
