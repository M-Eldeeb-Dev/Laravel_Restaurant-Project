@extends('layouts.admin-layout')
@section('title', 'Create Meal')
@section('subtitle', 'Add a new menu item')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-restaurant">
                <div class="card-body p-4">
                    <h4 class="restaurant-font mb-4">
                        <i class="fas fa-plus-circle me-2" style="color: #c9a961;"></i>
                        New Meal
                    </h4>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger alert-restaurant mb-4">
                            <strong><i class="fas fa-exclamation-triangle me-2"></i>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('meals.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold mb-2">
                                <i class="fas fa-utensils me-2" style="color: #c9a961;"></i>Meal Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control form-control-restaurant @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}"
                                   placeholder="e.g., Grilled Salmon, Caesar Salad"
                                   required>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold mb-2">
                                <i class="fas fa-align-left me-2" style="color: #c9a961;"></i>Description <span class="text-danger">*</span>
                            </label>
                            <textarea name="description" 
                                      id="description"
                                      class="form-control form-control-restaurant @error('description') is-invalid @enderror" 
                                      rows="4"
                                      placeholder="Describe the meal, ingredients, and preparation style"
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="price" class="form-label fw-semibold mb-2">
                                    <i class="fas fa-dollar-sign me-2" style="color: #c9a961;"></i>Price <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" 
                                           name="price" 
                                           id="price"
                                           step="0.01"
                                           min="0"
                                           class="form-control form-control-restaurant @error('price') is-invalid @enderror" 
                                           value="{{ old('price') }}"
                                           placeholder="0.00"
                                           required>
                                </div>
                                @error('price')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label for="category_id" class="form-label fw-semibold mb-2">
                                    <i class="fas fa-tag me-2" style="color: #c9a961;"></i>Category <span class="text-danger">*</span>
                                </label>
                                <select name="category_id" 
                                        id="category_id"
                                        class="form-select form-control-restaurant @error('category_id') is-invalid @enderror" 
                                        required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold mb-2">
                                <i class="fas fa-image me-2" style="color: #c9a961;"></i>Meal Image
                            </label>
                            <input type="file" 
                                   name="image" 
                                   id="image"
                                   accept="image/jpeg,image/png,image/jpg"
                                   class="form-control form-control-restaurant @error('image') is-invalid @enderror"
                                   onchange="previewImage(this)">
                            <small class="text-muted d-block mt-2">
                                <i class="fas fa-info-circle me-1"></i>
                                Accepted formats: JPG, PNG (Max: 2MB)
                            </small>
                            @error('image')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-restaurant">
                                <i class="fas fa-save me-2"></i>Create Meal
                            </button>
                            <a href="{{ route('meals.index') }}" class="btn btn-restaurant-outline">
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
                            Use clear, appetizing descriptions
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            High-quality images attract customers
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Set competitive pricing
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Choose the appropriate category
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
