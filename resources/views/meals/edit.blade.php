@extends('layouts.admin-layout')
@section('title', 'Edit Meal')
@section('subtitle', 'Update meal information')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-restaurant">
                <div class="card-body p-4">
                    <h4 class="restaurant-font mb-4">
                        <i class="fas fa-edit me-2" style="color: #c9a961;"></i>
                        Edit Meal: <span class="text-muted">{{ $meal->name }}</span>
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
                    
                    <form method="POST" action="{{ route('meals.update', $meal) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold mb-2">
                                <i class="fas fa-utensils me-2" style="color: #c9a961;"></i>Meal Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control form-control-restaurant @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $meal->name) }}"
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
                                      required>{{ old('description', $meal->description) }}</textarea>
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
                                           value="{{ old('price', $meal->price) }}"
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
                @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ old('category_id', $meal->category_id) == $category->id ? 'selected' : '' }}>
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
                                Accepted formats: JPG, PNG (Max: 2MB). Leave empty to keep current image.
                            </small>
                            @error('image')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            
                            @if ($meal->image)
                                <div class="mt-3">
                                    <p class="small text-muted mb-2">Current Image:</p>
                                    <div class="current-image-container">
                                        <img src="{{ asset('storage/' . $meal->image) }}" 
                                             alt="{{ $meal->name }}"
                                             class="current-meal-image">
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-restaurant">
                                <i class="fas fa-save me-2"></i>Update Meal
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
                        Meal Info
                    </h5>
                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">Category</small>
                        <span class="badge" style="background-color: #c9a961;">{{ $meal->category->name }}</span>
        </div>
        <div class="mb-3">
                        <small class="text-muted d-block mb-1">Created</small>
                        <span class="d-block">{{ $meal->created_at->format('M d, Y') }}</span>
                    </div>
                    @if($meal->updated_at != $meal->created_at)
                        <div>
                            <small class="text-muted d-block mb-1">Last Updated</small>
                            <span class="d-block">{{ $meal->updated_at->format('M d, Y') }}</span>
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
                    <a href="{{ route('meals.index') }}" class="btn btn-restaurant-outline w-100 mb-2">
                        <i class="fas fa-arrow-left me-2"></i>Back to Meals
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
