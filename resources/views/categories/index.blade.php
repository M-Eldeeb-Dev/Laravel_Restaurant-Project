@extends('layouts.admin-layout')
@section('title', 'Categories')
@section('subtitle', 'Manage your menu categories')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="restaurant-font mb-0">Menu Categories</h3>
            <p class="text-muted mb-0 small">Organize your menu items</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-restaurant">
            <i class="fas fa-plus me-2"></i>Add New Category
        </a>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success alert-restaurant mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif
    
    @if($categories->count() > 0)
        <div class="card card-restaurant">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-restaurant mb-0">
                        <thead>
                            <tr>
                                <th><i class="fas fa-tag me-2"></i>Name</th>
                                <th><i class="fas fa-link me-2"></i>Slug</th>
                                <th><i class="fas fa-align-left me-2"></i>Description</th>
                                <th class="text-center"><i class="fas fa-cog me-2"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <strong>{{ $category->name }}</strong>
                                    </td>
                                    <td>
                                        <code class="text-muted">{{ $category->slug }}</code>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ $category->description ?? 'No description provided' }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <a href="{{ route('categories.edit', $category) }}" 
                                               class="btn btn-sm btn-restaurant-outline"
                                               title="Edit Category">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm(`Delete Category {{ $category->name }}`);">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-restaurant-outline bg-warning"
                                                        title="Delete Category {{ $category->name }}">
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
                <i class="fas fa-tags fa-4x mb-3" style="color: #c9a961; opacity: 0.5;"></i>
                <h4 class="restaurant-font mb-2">No Categories Yet</h4>
                <p class="text-muted mb-4">Get started by creating your first menu category.</p>
                <a href="{{ route('categories.create') }}" class="btn btn-restaurant">
                    <i class="fas fa-plus me-2"></i>Create First Category
                </a>
            </div>
        </div>
    @endif
@endsection
