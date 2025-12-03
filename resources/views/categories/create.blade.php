@extends('layouts.admin-layout')
@section('title', 'Create Category')
@section('subtitle', 'Add a new menu category')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-restaurant">
                <div class="card-body p-4">
                    <h4 class="restaurant-font mb-4">
                        <i class="fas fa-plus-circle me-2" style="color: #c9a961;"></i>
                        New Category
                    </h4>
                    
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold mb-2">
                                <i class="fas fa-tag me-2" style="color: #c9a961;"></i>Category Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control form-control-restaurant @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}"
                                   placeholder="e.g., Appetizers, Main Courses, Desserts"
                                   required>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold mb-2">
                                <i class="fas fa-align-left me-2" style="color: #c9a961;"></i>Description
                            </label>
                            <textarea name="description" 
                                      id="description"
                                      class="form-control form-control-restaurant" 
                                      rows="4"
                                      placeholder="Enter a brief description of this category (optional)">{{ old('description') }}</textarea>
                            <small class="text-muted">This description will help organize your menu items.</small>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-restaurant">
                                <i class="fas fa-save me-2"></i>Create Category
                            </button>
                            <a href="{{ route('categories.index') }}" class="btn btn-restaurant-outline">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card card-restaurant">
                <div class="card-body p-4">
                    <h5 class="restaurant-font mb-3">
                        <i class="fas fa-info-circle me-2" style="color: #c9a961;"></i>
                        Tips
                    </h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Use clear, descriptive names
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Categories help organize your menu
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            You can edit categories later
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
