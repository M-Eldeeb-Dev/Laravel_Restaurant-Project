@extends('layouts.admin-layout')
@section('title', 'Edit Category')
@section('subtitle', 'Update category information')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-restaurant">
                <div class="card-body p-4">
                    <h4 class="restaurant-font mb-4">
                        <i class="fas fa-edit me-2" style="color: #c9a961;"></i>
                        Edit Category: <span class="text-muted">{{ $category->name }}</span>
                    </h4>
                    
                    <form method="POST" action="{{ route('categories.update', $category) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold mb-2">
                                <i class="fas fa-tag me-2" style="color: #c9a961;"></i>Category Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control form-control-restaurant @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $category->name ?? '') }}"
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
                                      placeholder="Enter a brief description of this category (optional)">{{ old('description', $category->description ?? '') }}</textarea>
                            <small class="text-muted">This description will help organize your menu items.</small>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-restaurant">
                                <i class="fas fa-save me-2"></i>Update Category
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
                        Category Info
                    </h5>
                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">Slug</small>
                        <code class="d-block p-2 bg-light rounded">{{ $category->slug }}</code>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">Created</small>
                        <span class="d-block">{{ $category->created_at->format('M d, Y') }}</span>
                    </div>
                    @if($category->updated_at != $category->created_at)
                        <div>
                            <small class="text-muted d-block mb-1">Last Updated</small>
                            <span class="d-block">{{ $category->updated_at->format('M d, Y') }}</span>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="card card-restaurant mt-3">
                <div class="card-body p-4">
                    <h5 class="restaurant-font mb-3">
                        <i class="fas fa-lightbulb me-2" style="color: #c9a961;"></i>
                        Quick Actions
                    </h5>
                    <a href="{{ route('categories.index') }}" class="btn btn-restaurant-outline w-100 mb-2">
                        <i class="fas fa-arrow-left me-2"></i>Back to Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
